<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\CourseServiceInterface;
use App\Services\Interfaces\CriteriaServiceInterface;
use App\Services\Interfaces\EvaluationServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    protected $courseService;
    protected $criteriaService;
    protected $evaluationService;

    public function __construct(CourseServiceInterface $courseService,
                                CriteriaServiceInterface $criteriaService,
                                EvaluationServiceInterface $evaluationService)
    {
        $this->courseService = $courseService;
        $this->criteriaService = $criteriaService;
        $this->evaluationService = $evaluationService;
        $this->middleware('auth')->only(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = $this->courseService->getCourses();
        return view('courses', compact('courses'));
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function show($id)
    {
        $course = $this->courseService->getCourseById($id);
        $criteria = $this->criteriaService->getAllCriteria();
        $numberEvaluation = $this->evaluationService->countEvaluation($id);
        $isEvaluated = count($this->evaluationService->getEvaluation($id, Auth::id())) == 1;

        return view('course_single', [
            'course' => $course,
            'criteria' => $criteria,
            'numberEvaluation' => $numberEvaluation,
            'isEvaluated' => $isEvaluated,
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
