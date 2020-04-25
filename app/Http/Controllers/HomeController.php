<?php

namespace App\Http\Controllers;

use App\Course;
use App\Services\Interfaces\CourseServiceInterface;
use App\Services\Interfaces\LessonServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $lessonService;
    protected $courseService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LessonServiceInterface $lessonService,
                                CourseServiceInterface $courseService)
    {
        $this->middleware('auth');
        $this->lessonService = $lessonService;
        $this->courseService = $courseService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topCourses = $this->courseService->getTopCourses(Course::PER_PAGE);

        return view('welcome', compact('topCourses'));
    }
}
