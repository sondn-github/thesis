<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DetailEvaluationByCriteriaTypeReport;
use App\Exports\TotalEvaluationExport;
use App\Services\Interfaces\ReportServiceInterface;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    private $reportService;

    public function __construct(ReportServiceInterface $reportService)
    {
        $this->reportService = $reportService;
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

    public function test() {
        dd($this->reportService->getDetailEvaluationByCriteriaType(Type::TYPE_DHBK_SV));
//        return \Maatwebsite\Excel\Facades\Excel::download(new DetailEvaluationByCriteriaTypeReport($this->reportService), 'test.xlsx');
    }
}
