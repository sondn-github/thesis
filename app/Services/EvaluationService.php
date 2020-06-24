<?php


namespace App\Services;


use App\Criteria;
use App\Evaluation;
use App\Course;
use App\Services\Interfaces\EvaluationServiceInterface;
use App\Type;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluationService extends Service implements EvaluationServiceInterface
{
    public function storeEvaluation(Request $request)
    {
        $answers = $request->answers;

        $result = Evaluation::create([
            Evaluation::COL_USER_ID => Auth::id(),
            Evaluation::COL_COURSE_ID => $request->input(Evaluation::COL_COURSE_ID),
            Evaluation::COL_ANSWERS => $answers,
            Evaluation::COL_TYPE => $request->input(Evaluation::COL_TYPE),
            Evaluation::COL_CRITERIA_TYPE => $request->input(Evaluation::COL_CRITERIA_TYPE),
        ]);
        if ($result && $request->input(Evaluation::COL_TYPE) == Evaluation::TYPE_PFR) {
            $this->calculateToPFR($request->input(Evaluation::COL_COURSE_ID));
        }

        return $result;
    }

    public function getCriteriaType($criteriaCode, $criteriaArr) {
        foreach ($criteriaArr as $c) {
            if ($c->code == $criteriaCode) {
                return $c->type->id;
            }
        }

        return false;
    }

    public function calculateToPFR($courseId) {
        $evaluations = Evaluation::with('user')
            ->where(Evaluation::COL_COURSE_ID, $courseId)
            ->where(Evaluation::COL_TYPE, Evaluation::TYPE_PFR)
            ->get();
        $results = [];
        $reliabilities = [];
        $criteria = [];
        $pfr = [];
        $sumReliabilityByCriteriaType = [];

        foreach ($evaluations as $evaluation) {
            $results[$evaluation->user_id] = $evaluation->answers;
            $reliabilities[$evaluation->user_id] = $evaluation->user->reliability;
            if (!isset($sumReliabilityByCriteriaType[$evaluation->criteria_type])) {
                $sumReliabilityByCriteriaType[$evaluation->criteria_type] = 0;
            }
            $sumReliabilityByCriteriaType[$evaluation->criteria_type] += $evaluation->user->reliability;
        }

        foreach ($results as $userId => $answers) {
            foreach ($answers as $criteriaCode => $answer) {
                if (!isset($criteria[$criteriaCode][Evaluation::AGREEMENT])) {
                    $criteria[$criteriaCode][Evaluation::AGREEMENT] = 0;
                }
                if (!isset($criteria[$criteriaCode][Evaluation::NEUTRAL])) {
                    $criteria[$criteriaCode][Evaluation::NEUTRAL] = 0;
                }
                if (!isset($criteria[$criteriaCode][Evaluation::DISAGREEMENT])) {
                    $criteria[$criteriaCode][Evaluation::DISAGREEMENT] = 0;
                }
                switch ((int)$answer) {
                    case Evaluation::AGREEMENT:
                        $criteria[$criteriaCode][Evaluation::AGREEMENT] += $reliabilities[$userId];
                        break;
                    case Evaluation::NEUTRAL:
                        $criteria[$criteriaCode][Evaluation::NEUTRAL] += $reliabilities[$userId];
                        break;
                    case Evaluation::DISAGREEMENT:
                        $criteria[$criteriaCode][Evaluation::DISAGREEMENT] += $reliabilities[$userId];
                        break;
                }
            }
        }

        $criteriaArr = Criteria::with('type')
            ->get();

        foreach ($criteria as $criteriaCode => $memberships) {
            $criteriaType = $this->getCriteriaType($criteriaCode, $criteriaArr);
            foreach ($memberships as $key => $value) {
                $pfr[$criteriaCode][$key] = round($value/$sumReliabilityByCriteriaType[$criteriaType], 2);
            }
        }
        $this->savePFR($pfr, $courseId);
    }

    public function savePFR($pfr, $courseId) {
        return Course::findOrFail($courseId)->update([
            Course::COL_PFR => $pfr,
        ]);
    }

    public function getAvgEvaluation($courseId) {
        $pfr = Course::findOrFail($courseId)->pfr;
        $sr = [];
        if ($pfr) {
            foreach ($pfr as $criteriaCode => $pfs) {
                $sr[$criteriaCode] = $pfs[Evaluation::AGREEMENT] - $pfs[Evaluation::DISAGREEMENT]*(1 - $pfs[Evaluation::AGREEMENT] - $pfs[Evaluation::NEUTRAL] - $pfs[Evaluation::DISAGREEMENT]);
            }
        }

        return $sr;
    }

    public function countEvaluation($courseId) {
        return Evaluation::where(Evaluation::COL_COURSE_ID, $courseId)
            ->count();
    }

    public function getEvaluation($courseId, $userId) {
        $usingTypeId = Type::select(Type::COL_ID)
            ->where(Type::COL_IS_USING, true)
            ->get();

        return Evaluation::where(Evaluation::COL_COURSE_ID, $courseId)
            ->where(Evaluation::COL_USER_ID, $userId)
            ->whereIn(Evaluation::COL_CRITERIA_TYPE, $usingTypeId)
            ->get();
    }

    public function reportEvaluationsOfCourse($courseId, $request) {
        $evaluations = Evaluation::where(Evaluation::COL_COURSE_ID, $courseId)
            ->where(Evaluation::COL_TYPE, Evaluation::TYPE_PFR)
            ->where(Evaluation::COL_CRITERIA_TYPE, Type::TYPE_DHBK_SV);

        if ($fromDate = $request->get('from-date')) {
            $evaluations->whereDate('created_at', '>=', $fromDate);
        }

        if ($toDate = $request->get('to-date')) {
            $evaluations->whereDate('created_at', '<=', $toDate);
        }

        if ($className = $request->get('class_name')) {
            $userIds = User::where('class_name', $className)->get()->pluck('id');
            $evaluations->whereIn(Evaluation::COL_USER_ID, $userIds);
        }

        $evaluations = $evaluations->get();

        $data = [];
        foreach ($evaluations as $evaluation) {
            foreach ($evaluation->answers as $criterionCode => $answer) {
                if (!isset($data[$criterionCode][Evaluation::AGREEMENT])) {
                    $data[$criterionCode][Evaluation::AGREEMENT] = 0;
                }
                if (!isset($data[$criterionCode][Evaluation::NEUTRAL])) {
                    $data[$criterionCode][Evaluation::NEUTRAL] = 0;
                }
                if (!isset($data[$criterionCode][Evaluation::DISAGREEMENT])) {
                    $data[$criterionCode][Evaluation::DISAGREEMENT] = 0;
                }
                if (!isset($data[$criterionCode][Evaluation::REFUSAL])) {
                    $data[$criterionCode][Evaluation::REFUSAL] = 0;
                }
                switch ((int)$answer) {
                    case Evaluation::AGREEMENT:
                        $data[$criterionCode][Evaluation::AGREEMENT] += 1;
                        break;
                    case Evaluation::NEUTRAL:
                        $data[$criterionCode][Evaluation::NEUTRAL] += 1;
                        break;
                    case Evaluation::DISAGREEMENT:
                        $data[$criterionCode][Evaluation::DISAGREEMENT] += 1;
                        break;
                    case Evaluation::REFUSAL:
                        $data[$criterionCode][Evaluation::REFUSAL] += 1;
                        break;
                }
            }
        }

        return $data;
    }

    public function getMinCreatedAt() {
        return Evaluation::where(Evaluation::COL_CREATED_AT, '!=', null)
            ->orderBy(Evaluation::COL_CREATED_AT, 'asc')
            ->firstOrFail()
            ->created_at;
    }
}
