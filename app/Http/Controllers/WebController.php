<?php

namespace App\Http\Controllers;

use App\Course;
use App\Services\Interfaces\CourseServiceInterface;
use App\Services\Interfaces\LessonServiceInterface;
use App\Services\Interfaces\PostServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class WebController extends Controller
{
    private $courseService;
    private $postService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CourseServiceInterface $courseService,
                                PostServiceInterface $postService)
    {
        $this->courseService = $courseService;
        $this->postService = $postService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topCourses = $this->courseService->getTopCourses(Course::PER_PAGE);
        $posts = $this->postService->getPost();

        return view('welcome', compact('topCourses'), compact('posts'));
    }

    public function changeLanguage(Request $request)
    {
        App::setLocale($request->lang);
    }
}
