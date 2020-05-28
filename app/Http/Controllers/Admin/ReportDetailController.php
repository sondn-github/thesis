<?php

namespace App\Http\Controllers\Admin;

use App\Services\Interfaces\CourseServiceInterface;
use App\Services\Interfaces\CriteriaServiceInterface;
use App\Services\Interfaces\EvaluationServiceInterface;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportDetailController extends Controller
{
    private $courseService;
    private $criteriaService;
    private $evaluationService;

    public function __construct(CourseServiceInterface $courseService,
                                CriteriaServiceInterface $criteriaService,
                                EvaluationServiceInterface $evaluationService)
    {
        $this->courseService = $courseService;
        $this->criteriaService = $criteriaService;
        $this->evaluationService = $evaluationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reports.detail.index');
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
        $course = $this->courseService->getCourseById($id);
        $type = $this->criteriaService->getCriteriaByTypeId(Type::TYPE_DHBK_SV);
        $evaluation = $this->evaluationService->reportEvaluationsOfCourse($id);

        return view('admin.reports.detail.show', [
            'course' => $course,
            'type' => $type,
            'evaluation' => $evaluation,
        ]);
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
