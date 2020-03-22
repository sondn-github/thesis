<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\CriteriaServiceInterface;
use App\Services\Interfaces\LessonServiceInterface;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    protected $lessonService;
    protected $criteriaService;

    public function __construct(LessonServiceInterface $lessonService,
                                CriteriaServiceInterface $criteriaService)
    {
        $this->lessonService = $lessonService;
        $this->criteriaService = $criteriaService;
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
        $this->lessonService->increaseView($request->id);
        $lesson = $this->lessonService->getLessonDetailById($request->id);
        $criteria = $this->criteriaService->getAllCriteria();

        return view('lesson', compact('lesson'), compact('criteria'));
    }
}
