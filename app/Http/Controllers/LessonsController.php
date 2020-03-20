<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\LessonServiceInterface;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    protected $lessonService;

    public function __construct(LessonServiceInterface $lessonService)
    {
        $this->lessonService = $lessonService;
    }

    public function getLessonDetail(Request $request) {
        $lesson = $this->lessonService->getLessonDetailById($request->id);

        return view('lesson_single', compact('lesson'));
    }

    public function getLessons()
    {
        $lessons = $this->lessonService->getAll();

        return view('lessons', compact('lessons'));
    }

    public function displayLesson(Request $request)
    {
        $lesson = $this->lessonService->getLessonDetailById($request->id);

        return view('lesson', compact('lesson'));
    }
}
