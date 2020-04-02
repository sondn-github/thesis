<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLessonRequest;
use App\Services\Interfaces\CourseServiceInterface;
use App\Services\Interfaces\CriteriaServiceInterface;
use App\Services\Interfaces\LessonServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonsController extends Controller
{
    protected $lessonService;
    protected $criteriaService;
    protected $courseService;
    protected $userService;

    public function __construct(LessonServiceInterface $lessonService,
                                CriteriaServiceInterface $criteriaService,
                                CourseServiceInterface $courseService,
                                UserServiceInterface $userService)
    {
        $this->lessonService = $lessonService;
        $this->criteriaService = $criteriaService;
        $this->courseService = $courseService;
        $this->userService = $userService;
    }

    public function getLessonDetail(Request $request) {
        $lesson = $this->lessonService->getLessonDetailById($request->id);
        $teacher = $this->userService->getUserById($lesson->course->user_id);

        return view('lesson_single', compact('lesson'), compact('teacher'));
    }

    public function getLessons(Request $request)
    {
        if ($request->has('search') && $request->search != '')
        {
            $request->flash();
            $lessons = $this->lessonService->getLessonByName($request->search);
        } else {
            $lessons = $this->lessonService->getAll();
        }

        return view('lessons', compact('lessons'));
    }

    public function displayLesson(Request $request)
    {
        $this->lessonService->increaseView($request->id);
        $lesson = $this->lessonService->getLessonDetailById($request->id);
        $teacher = $this->userService->getUserById($lesson->course->user_id);
        $criteria = $this->criteriaService->getAllCriteria();

        return view('lesson', [
            'lesson' => $lesson,
            'criteria' => $criteria,
            'teacher' => $teacher,
        ]);
    }

    public function create() {
        $userId = Auth::id();
        $courses = $this->courseService->getCoursesByUserId($userId);

        return view('teacher.upload_lesson', compact('courses'));
    }

    public function store(StoreLessonRequest $request) {
        if ($this->lessonService->store($request)) {
            return redirect()->route('teacher.lesson.create')->with(['success' => __('successStoring')]);
        } else {
            return redirect()->route('teacher.lesson.create')
                ->withInput()
                ->withErrors(['message' => __('failedStoring')]);
        }
    }
}
