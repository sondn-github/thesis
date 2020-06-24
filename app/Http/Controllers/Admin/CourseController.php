<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\Interfaces\CourseServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    protected $courseService;
    protected $categoryService;

    public function __construct(CourseServiceInterface $courseService,
                                CategoryServiceInterface $categoryService)
    {
        $this->courseService = $courseService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json($this->courseService->getCourseById($id), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function edit($id)
    {
        $course = $this->courseService->getCourseById($id);
        $categories = $this->categoryService->getCategories();
        return view('admin.courses.edit', compact('course'), compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCourseRequest $request, $id)
    {
        if ($this->courseService->update($request, $id)) {
            return redirect()->back()->with('success', __('course.updateSuccess'));
        } else {
            return redirect()->back()->withErrors(['message' => __('course.updateFailed')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if ($this->courseService->destroy($id)) {
            return response()->json([
                'success' => __('lesson.deleteSuccess'),
            ], 200);
        } else {
            return response()->json([
                'error' => __('lesson.deleteFailed'),
            ], 500);
        }
    }

    public function changeStatus(Request $request) {
        if ($this->courseService->changeStatus($request)) {
            return response()->json([
                'success' => __('lesson.updateSuccess'),
            ], 200);
        } else {
            return response()->json([
                'error' => __('lesson.updateFailed'),
            ], 500);
        }
    }
}
