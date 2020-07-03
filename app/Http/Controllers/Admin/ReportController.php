<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DetailEvaluationByCriteriaTypeReport;
use App\Exports\DetailEvaluationOfCourse;
use App\Exports\TotalEvaluationExport;
use App\Services\Interfaces\CourseServiceInterface;
use App\Services\Interfaces\CriteriaServiceInterface;
use App\Services\Interfaces\EvaluationServiceInterface;
use App\Services\Interfaces\ReportServiceInterface;
use App\Services\Interfaces\TypeServiceInterface;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    private $reportService;
    private $typeService;
    private $evaluationService;
    private $criteriaService;
    private $courseService;

    public function __construct(ReportServiceInterface $reportService,
                                TypeServiceInterface $typeService,
                                EvaluationServiceInterface $evaluationService,
                                CriteriaServiceInterface $criteriaService,
                                CourseServiceInterface $courseService)
    {
        $this->reportService = $reportService;
        $this->typeService = $typeService;
        $this->evaluationService = $evaluationService;
        $this->criteriaService = $criteriaService;
        $this->courseService = $courseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->reportService->getNumberEvaluationByCriteriaType()->toArray();
        return view('admin.reports.chart', compact('data'));
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

    public function exportTotalEvaluation() {
        return Excel::download(new TotalEvaluationExport($this->reportService), 'total.xlsx');
    }

    public function exportDetailEvaluationByCriteria(Request $request) {
        return Excel::download(new DetailEvaluationByCriteriaTypeReport($this->reportService, $request->criteria_type), 'detail.xlsx');
    }

    public function exportEvaluationOfCourse(Request $request)
    {
        return Excel::download(new DetailEvaluationOfCourse($this->typeService, $this->evaluationService, $this->criteriaService, $request), 'detail-course-' . $this->courseService->getCourseById($request->route('course_id'))->name . '.xlsx');
    }

    public function test() {
        dd($this->reportService->getDetailEvaluationByCriteriaType(Type::TYPE_DHBK_SV));
//        return \Maatwebsite\Excel\Facades\Excel::download(new DetailEvaluationByCriteriaTypeReport($this->reportService), 'test.xlsx');
    }
}
