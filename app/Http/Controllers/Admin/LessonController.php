<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateLessonRequest;
use App\Services\Interfaces\CourseServiceInterface;
use App\Services\Interfaces\CriteriaServiceInterface;
use App\Services\Interfaces\EvaluationServiceInterface;
use App\Services\Interfaces\LessonServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
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

    public function index() {
        return view('admin.lessons.index');
    }

    public function show($id) {
        $lesson = $this->lessonService->getLesson($id);
        if ($lesson) {
            return response()->json($lesson, 200);
        } else {
            return response(__('lesson.failed-message'), 401);
        }
    }

    public function edit($id) {
        $lesson = $this->lessonService->getLesson($id);

        return view('admin.lessons.edit', compact('lesson'));
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

    public function destroy($id) {
        if ($this->lessonService->destroy($id, Auth::id())) {
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
