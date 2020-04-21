<?php

namespace App\Http\Controllers;

use App\Evaluation;
use App\Services\Interfaces\EvaluationServiceInterface;
use App\Services\Interfaces\KnowledgeServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    protected $evaluationService;
    protected $knowledgeService;

    public function __construct(EvaluationServiceInterface $evaluationService,
                                KnowledgeServiceInterface $knowledgeService)
    {
        $this->evaluationService = $evaluationService;
        $this->knowledgeService = $knowledgeService;
    }

    public function store(Request $request)
    {
        if (count($this->evaluationService->getEvaluation($request->input(Evaluation::COL_COURSE_ID), Auth::id())) == 1) {
            return response([
                'status' =>__('lesson.failed'),
                'message' => __('lesson.evaluated-message'),
            ], 401);
        } else {
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

    public function test() {
        return $this->evaluationService->getCriteriaType(6);
    }
}
