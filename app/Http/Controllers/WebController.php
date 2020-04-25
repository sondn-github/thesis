<?php

namespace App\Http\Controllers;

use App\Course;
use App\Services\Interfaces\CourseServiceInterface;
use App\Services\Interfaces\LessonServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class WebController extends Controller
{
    protected $courseService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CourseServiceInterface $courseService)
    {
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

    public function changeLanguage(Request $request)
    {
        App::setLocale($request->lang);
    }
}
