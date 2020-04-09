<?php


namespace App\Services;


use App\Evaluation;
use App\Lesson;
use App\Services\Interfaces\EvaluationServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monolog\Formatter\ElasticaFormatter;

class EvaluationService extends Service implements EvaluationServiceInterface
{
    public function storeEvaluation(Request $request)
    {
        $answers = $request->except([Evaluation::COL_LESSON_ID, '_token']);

        $result = Evaluation::create([
            Evaluation::COL_USER_ID => Auth::id(),
            Evaluation::COL_LESSON_ID => $request->input(Evaluation::COL_LESSON_ID),
            Evaluation::COL_ANSWERS => json_encode($answers),
        ]);
        if ($result) {
            $this->calculateToPFR($request->input(Evaluation::COL_LESSON_ID));
        }

        return $result;
    }

    public function calculateToPFR($lessonId) {
        $evaluations = Evaluation::with('user')
            ->select(Evaluation::COL_ANSWERS, Evaluation::COL_USER_ID)
            ->where(Evaluation::COL_LESSON_ID, $lessonId)
            ->get();
        $results = [];
        $reliabilities = [];
        $criteria = [];
        $pfr = [];

        foreach ($evaluations as $evaluation) {
            $results[$evaluation->user_id] = json_decode($evaluation->answers, true);
            $reliabilities[$evaluation->user_id] = $evaluation->user->reliability;
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
            foreach ($memberships as $key => $value) {
                $pfr[$criteriaId][$key] = round($value/array_sum($reliabilities), 2);
            }
        }
        $this->savePFR(json_encode($pfr), $lessonId);
    }

    public function savePFR($pfr, $lessonId) {
        return Lesson::findOrFail($lessonId)->update([
            Lesson::COL_PFR => $pfr,
        ]);
    }

    public function getAvgEvaluation($lessonId) {
        $pfr = json_decode(Lesson::findOrFail($lessonId)->pfr, true);
        $sr = [];
        if ($pfr) {
            foreach ($pfr as $criteriaId => $pfs) {
                $sr[$criteriaId] = $pfs[Evaluation::AGREEMENT] - $pfs[Evaluation::DISAGREEMENT]*(1 - $pfs[Evaluation::AGREEMENT] - $pfs[Evaluation::NEUTRAL] - $pfs[Evaluation::DISAGREEMENT]);
            }
        }

        return $sr;
    }

    public function countEvaluation($lessonId) {
        return Evaluation::where(Evaluation::COL_LESSON_ID, $lessonId)
            ->count();
    }
}
