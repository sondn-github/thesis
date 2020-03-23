<?php


namespace App\Services;


use App\Evaluation;
use App\Services\Interfaces\EvaluationServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluationService extends Service implements EvaluationServiceInterface
{
    public function storeEvaluation(Request $request)
    {
        $answers = $request->except([Evaluation::COL_LESSON_ID, '_token']);

        return Evaluation::create([
            Evaluation::COL_USER_ID => Auth::id(),
            Evaluation::COL_LESSON_ID => $request->input(Evaluation::COL_LESSON_ID),
            Evaluation::COL_ANSWERS => json_encode($answers),
        ]);
    }
}
