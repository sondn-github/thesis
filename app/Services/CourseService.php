<?php


namespace App\Services;


use App\Course;
use App\Criteria;
use App\Evaluation;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Lesson;
use App\Services\Interfaces\CourseServiceInterface;
use App\Type;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Routing\CompiledRoute;
use function GuzzleHttp\Psr7\_parse_request_uri;

class CourseService extends Service implements CourseServiceInterface
{
    public function getCoursesByUserId($userId) {
        return Course::where(Course::COL_USER_ID, $userId)
            ->get();
    }

    public function getCourseById($courseId) {
        return Course::with(['category', 'user', 'lesson' => function ($query) {
            $query->where(Lesson::COL_STATUS, Lesson::ACTIVE_STATUS);
        }])->where(Course::COL_ID, $courseId)
            ->first();
    }

    public function update(UpdateCourseRequest $request, $id) {
        return Course::findOrFail($id)->update([
            Course::COL_NAME => $request->input(Course::COL_NAME),
            Course::COL_CATEGORY_ID => $request->input(Course::COL_CATEGORY_ID),
            Course::COL_DESCRIPTION => $request->input(Course::COL_DESCRIPTION),
            Course::COL_LINK => $request->input(Course::COL_LINK),
        ]);
    }

    public function destroy($id) {
        return Course::findOrFail($id)->delete();
    }

    public function store(StoreCourseRequest $request, $teacherId) {
        return Course::create([
            Course::COL_NAME => $request->input(Course::COL_NAME),
            Course::COL_CATEGORY_ID => $request->input(Course::COL_CATEGORY_ID),
            Course::COL_DESCRIPTION => $request->input(Course::COL_DESCRIPTION),
            Course::COL_USER_ID => $teacherId,
            Course::COL_LINK => $request->input(Course::COL_LINK),
        ]);
    }

    public function getCourses() {
        return Course::with('category')->paginate(Course::PER_PAGE);
    }

    public function getCoursesByCategory($categoryId) {
        return Course::with('category')
            ->where(Course::COL_CATEGORY_ID, $categoryId)
            ->paginate(Course::PER_PAGE);
    }

    public function getTopCourses($limit) {
        $typeId = $this->getUsingCriteriaTypeId();
        $evaluations = Evaluation::select(DB::raw('count(*) as count, course_id'))
            ->whereIn(Evaluation::COL_CRITERIA_TYPE, $typeId)
            ->where(Evaluation::COL_TYPE, Evaluation::TYPE_PFR)
            ->groupBy(Evaluation::COL_COURSE_ID)
            ->having('count', '>=', Evaluation::MIN_NUMBER_EVALUATION)
            ->get();

        $coursesId = [];
        foreach ($evaluations as $evaluation) {
            $coursesId[] = $evaluation->course_id;
        }

        if (count($coursesId) == 0) {
            return Course::with('category')
                ->limit($limit)
                ->get();
        }

        $defaultPFS = [Evaluation::AGREEMENT => 0, Evaluation::NEUTRAL => 0, Evaluation::DISAGREEMENT => 0];

        $courses = Course::whereIn(Course::COL_ID, $coursesId)
            ->get();

        $bestPFR = [];
        $criteria = $this->getUsingCriteria($typeId);
        foreach ($criteria as $c) {
            $bestPFR[$c->code] = $defaultPFS;
        }

        foreach ($criteria as $c) {
            foreach ($courses as $course) {
                if (isset($course->pfr[$c->code])) {
                    $bestPFR[$c->code][Evaluation::AGREEMENT] = max($bestPFR[$c->code][Evaluation::AGREEMENT], $course->pfr[$c->code][Evaluation::AGREEMENT]);
                    $bestPFR[$c->code][Evaluation::NEUTRAL] = min($bestPFR[$c->code][Evaluation::NEUTRAL], $course->pfr[$c->code][Evaluation::NEUTRAL]);
                    $bestPFR[$c->code][Evaluation::DISAGREEMENT] = min($bestPFR[$c->code][Evaluation::DISAGREEMENT], $course->pfr[$c->code][Evaluation::DISAGREEMENT]);
                }
            }
        }
        $entropies = [];
        foreach ($criteria as $c) {
            foreach ($courses as $course) {
                $entropies[$course->id] = $this->calculateEntropy($course->pfr, $bestPFR, $criteria);
            }
        }

        $sortedCoursesId = collect($entropies)->sort()->keys()->all();
        $sortedCoursesIdStr = implode(',', $sortedCoursesId);

        return Course::with('category')
            ->whereIn(Course::COL_ID, $sortedCoursesId)
            ->orderByRaw(DB::raw("FIELD(id, $sortedCoursesIdStr)"))
            ->limit($limit)
            ->get();
    }

    public function calculateEntropy($pfrSource, $bestPfr, $usingCriteria) {
        $entropy = 0;
        $weight = $this->standardizeWeight($usingCriteria);
        foreach ($bestPfr as $criteriaCode => $pfs) {
            if (!isset($pfrSource[$criteriaCode])) {
                $pfrSource[$criteriaCode] = [Evaluation::AGREEMENT => 0, Evaluation::NEUTRAL => 0, Evaluation::DISAGREEMENT => 0];
            }
            foreach ($pfs as $answer => $bestMembership) {
                $entropy += $this->calculateElementEntropy($pfrSource[$criteriaCode][$answer], $bestMembership, $weight[$criteriaCode]);
            }
        }

        return $entropy;
    }

//    public function getWeightCriteria($criteriaId) {
//        return Criteria::findOrFail($criteriaId)
//            ->weight;
//    }

    public function standardizeWeight($usingCriteria) {
        $weight = [];
        $sumWeight = 0;
        $criteria = $usingCriteria;
        foreach ($criteria as $c) {
            $sumWeight += $c->weight;
        }
        foreach ($criteria as $c) {
            $weight[$c->code] = $c->weight / $sumWeight;
        }
        return $weight;
    }

    public function calculateElementEntropy($membershipSource, $bestMembership, $weight) {
        $result = 0;
        if ($membershipSource == 0) {
            $result = $weight * (1 - $membershipSource) * log((1 - $membershipSource) / (1 - 0.5*($membershipSource + $bestMembership)));
        } elseif ($membershipSource == 1) {
            $result = 0;
        } else  {
            $result = $weight * ($membershipSource * log(($membershipSource / (0.5 * ($membershipSource + $bestMembership))))
                    + (1 - $membershipSource) * log((1 - $membershipSource) / (1 - 0.5*($membershipSource + $bestMembership))));
        }

        return $result;
    }

    public function getUsingCriteria($typesId)
    {
        return Criteria::where(Criteria::COL_STATUS, Criteria::ACTIVE_STATUS)
            ->whereIn(Criteria::COL_TYPE_ID, $typesId)
            ->get();
    }

    public function getUsingCriteriaTypeId() {
        return Type::where(Type::COL_IS_USING, true)
            ->where(Type::COL_ID, '!=', 3)
            ->pluck(Type::COL_ID)
            ->toArray();
    }

}
