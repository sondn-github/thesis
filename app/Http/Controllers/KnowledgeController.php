<?php

namespace App\Http\Controllers;

use App\Evaluation;
use App\Knowledge;
use App\Services\Interfaces\EvaluationServiceInterface;
use App\Services\Interfaces\KnowledgeServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KnowledgeController extends Controller
{
    protected $knowledgeService;
    protected $evaluationService;

    public function __construct(KnowledgeServiceInterface $knowledgeService,
                                EvaluationServiceInterface $evaluationService)
    {
        $this->knowledgeService = $knowledgeService;
        $this->evaluationService = $evaluationService;
    }

    public function getAdvises(Request $request) {
        $numberEvaluation = $this->evaluationService->countEvaluation($request->id);
        if ($numberEvaluation > Evaluation::MIN_NUMBER_EVALUATION) {
            $sr = $this->evaluationService->getAvgEvaluation($request->id);
            $data = $this->knowledgeService->getAdvises($sr);
            return response()->json([
                'advises' => $data['advices'],
                'count' => $numberEvaluation,
                'reliabilities' => $data['reliabilities'],
            ], 200);
        } else {
            return response()->json(__('lesson.noAdvise'), 401);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sr = $this->evaluationService->getAvgEvaluation(1);
//        dd($this->knowledgeService->deduceWithRule1($sr));
//        dd($this->knowledgeService->compareWithRule2($this->knowledgeService->deduceWithRule1($sr), Knowledge::find(17)));
//        dd($this->knowledgeService->getAdvises($sr));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
