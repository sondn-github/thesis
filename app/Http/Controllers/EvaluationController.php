<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\EvaluationServiceInterface;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    protected $evaluationService;

    public function __construct(EvaluationServiceInterface $evaluationService)
    {
        $this->evaluationService = $evaluationService;
    }

    public function store(Request $request)
    {
        if ($this->evaluationService->storeEvaluation($request))
        {
            return response([
                'status' =>__('lesson.success'),
                'message' => __('lesson.success-message'),
            ], 200);
        }
        else
        {
            return response([
                'status' =>__('lesson.failed'),
                'message' => __('lesson.failed-message'),
            ], 500);
        }
    }
}
