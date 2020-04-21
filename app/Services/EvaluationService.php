<?php


namespace App\Services;


use App\Criteria;
use App\Evaluation;
use App\Course;
use App\Services\Interfaces\EvaluationServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluationService extends Service implements EvaluationServiceInterface
{
    public function storeEvaluation(Request $request)
    {
        $answers = $request->except([Evaluation::COL_COURSE_ID, '_token', Evaluation::COL_TYPE, Evaluation::COL_CRITERIA_TYPE]);

        $result = Evaluation::create([
            Evaluation::COL_USER_ID => Auth::id(),
            Evaluation::COL_COURSE_ID => $request->input(Evaluation::COL_COURSE_ID),
            Evaluation::COL_ANSWERS => $answers,
            Evaluation::COL_TYPE => $request->input(Evaluation::COL_TYPE),
            Evaluation::COL_CRITERIA_TYPE => $request->input(Evaluation::COL_CRITERIA_TYPE),
        ]);
        if ($result) {
            $this->calculateToPFR($request->input(Evaluation::COL_COURSE_ID));
        }

        return $result;
    }

    public function getCriteriaType($criteriaId) {
        return Criteria::findOrFail($criteriaId)
            ->type
            ->id;
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
            foreach ($answers as $criteriaId => $answer) {
                if (!isset($criteria[$criteriaId][Evaluation::AGREEMENT])) {
                    $criteria[$criteriaId][Evaluation::AGREEMENT] = 0;
                }
                if (!isset($criteria[$criteriaId][Evaluation::NEUTRAL])) {
                    $criteria[$criteriaId][Evaluation::NEUTRAL] = 0;
                }
                if (!isset($criteria[$criteriaId][Evaluation::DISAGREEMENT])) {
                    $criteria[$criteriaId][Evaluation::DISAGREEMENT] = 0;
                }
                switch ((int)$answer) {
                    case Evaluation::AGREEMENT:
                        $criteria[$criteriaId][Evaluation::AGREEMENT] += $reliabilities[$userId];
                        break;
                    case Evaluation::NEUTRAL:
                        $criteria[$criteriaId][Evaluation::NEUTRAL] += $reliabilities[$userId];
                        break;
                    case Evaluation::DISAGREEMENT:
                        $criteria[$criteriaId][Evaluation::DISAGREEMENT] += $reliabilities[$userId];
                        break;
                }
            }
        }

        foreach ($criteria as $criteriaId => $memberships) {
            $criteriaType = $this->getCriteriaType($criteriaId);
            foreach ($memberships as $key => $value) {
                $pfr[$criteriaId][$key] = round($value/$sumReliabilityByCriteriaType[$criteriaType], 2);
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
            foreach ($pfr as $criteriaId => $pfs) {
                $sr[$criteriaId] = $pfs[Evaluation::AGREEMENT] - $pfs[Evaluation::DISAGREEMENT]*(1 - $pfs[Evaluation::AGREEMENT] - $pfs[Evaluation::NEUTRAL] - $pfs[Evaluation::DISAGREEMENT]);
            }
        }

        return $sr;
    }

    public function countEvaluation($courseId) {
        return Evaluation::where(Evaluation::COL_COURSE_ID, $courseId)
            ->count();
    }

    public function getEvaluation($courseId, $userId) {
        return Evaluation::where(Evaluation::COL_COURSE_ID, $courseId)
            ->where(Evaluation::COL_USER_ID, $userId)
            ->get();
    }
}
