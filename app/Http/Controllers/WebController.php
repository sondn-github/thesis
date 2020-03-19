<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\LessonServiceInterface;
use Illuminate\Http\Request;

class WebController extends Controller
{
    protected $lessonService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LessonServiceInterface $lessonService)
    {
        $this->lessonService = $lessonService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularLessons = $this->lessonService->getPopularLessons();

        return view('welcome', compact('popularLessons'));
    }
}
