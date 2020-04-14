<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Services\Interfaces\CourseServiceInterface;
use App\Services\Interfaces\CriteriaServiceInterface;
use App\Services\Interfaces\EvaluationServiceInterface;
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
    protected $evaluationService;

    public function __construct(LessonServiceInterface $lessonService,
                                CriteriaServiceInterface $criteriaService,
                                CourseServiceInterface $courseService,
                                UserServiceInterface $userService,
                                EvaluationServiceInterface $evaluationService)
    {
        $this->lessonService = $lessonService;
        $this->criteriaService = $criteriaService;
        $this->courseService = $courseService;
        $this->userService = $userService;
        $this->evaluationService = $evaluationService;
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
        $numberEvaluation = $this->evaluationService->countEvaluation($request->id);
        $isEvaluated = count($this->evaluationService->getEvaluation($request->id, Auth::id())) == 1 ? true : false;

        return view('lesson', [
            'lesson' => $lesson,
            'criteria' => $criteria,
            'teacher' => $teacher,
            'numberEvaluation' => $numberEvaluation,
            'isEvaluated' => $isEvaluated,
        ]);
    }

    public function create() {
        $userId = Auth::id();
        $courses = $this->courseService->getCoursesByUserId($userId);

        return view('teacher.lessons.create', compact('courses'));
    }

    public function store(StoreLessonRequest $request) {
        if ($this->lessonService->store($request)) {
            return redirect()->route('teacher.lesson.create')->with(['success' => __('lesson.successStoring')]);
        } else {
            return redirect()->route('teacher.lesson.create')
                ->withInput()
                ->withErrors(['message' => __('lesson.failedStoring')]);
        }
    }

    public function index() {
        return view('teacher.lessons.index');
    }

    public function getLessonOfTeacher(Request $request) {
        $lesson = $this->lessonService->getLessonOfTeacher($request->id, Auth::id());
        if ($lesson) {
            return response()->json($lesson, 200);
        } else {
            return response(__('lesson.failed-message'), 401);
        }
    }

    public function edit(Request $request) {
        $lesson = $this->lessonService->getLessonOfTeacher($request->id, Auth::id());
        $courses = $this->courseService->getCoursesByUserId(Auth::id());

        return view('teacher.lessons.edit', compact('lesson'), compact('courses'));
    }

    public function update(UpdateLessonRequest $request) {
        if ($this->lessonService->update($request, Auth::id())) {
            return redirect()->back()->with('success', __('lesson.updateSuccess'));
        } else {
            return redirect()->back()->withErrors(['message' => __('lesson.updateFailed')]);
        }
    }

    public function changeStatus(Request $request) {
        if ($this->lessonService->changeStatus($request, Auth::id())) {
            return response()->json([
                'success' => __('lesson.updateSuccess'),
            ], 200);
        } else {
            return response()->json([
                'error' => __('lesson.updateFailed'),
            ], 500);
        }
    }

    public function destroy(Request $request) {
        if ($this->lessonService->destroy($request, Auth::id())) {
            return response()->json([
                'success' => __('lesson.deleteSuccess'),
            ], 200);
        } else {
            return response()->json([
                'error' => __('lesson.deleteFailed'),
            ], 500);
        }
    }
}
