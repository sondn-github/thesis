<?php

namespace App\Http\Controllers\Admin;

use App\Services\Interfaces\CourseServiceInterface;
use App\Services\Interfaces\CriteriaServiceInterface;
use App\Services\Interfaces\EvaluationServiceInterface;
use App\Services\Interfaces\TypeServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportDetailController extends Controller
{
    private $courseService;
    private $criteriaService;
    private $evaluationService;
    private $typeService;
    private $userService;

    public function __construct(CourseServiceInterface $courseService,
                                CriteriaServiceInterface $criteriaService,
                                EvaluationServiceInterface $evaluationService,
                                TypeServiceInterface $typeService,
                                UserServiceInterface $userService)
    {
        $this->courseService = $courseService;
        $this->criteriaService = $criteriaService;
        $this->evaluationService = $evaluationService;
        $this->typeService = $typeService;
        $this->userService = $userService;
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
     * @param int $id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function show($id, Request $request)
    {
        $course = $this->courseService->getCourseById($id);
        $type = $this->criteriaService->getCriteriaByTypeId($this->typeService->getUsingTypeIdForReport());
        $evaluation = $this->evaluationService->reportEvaluationsOfCourse($id, $request, $this->typeService->getUsingTypeIdForReport());
        $fromDate = $this->evaluationService->getMinCreatedAt();
        $classes = $this->userService->getClasses();
        $request->flashExcept('_token');

        return view('admin.reports.detail.show', [
            'course' => $course,
            'type' => $type,
            'evaluation' => $evaluation,
            'fromDate' => $fromDate,
            'classes' => $classes,
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
