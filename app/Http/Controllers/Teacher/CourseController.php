<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\Interfaces\CourseServiceInterface;
use App\Services\Interfaces\DatatableServiceInterface;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryService->getCategories();

        return view('teacher.courses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        if ($this->courseService->store($request, Auth::id())) {
            return redirect()->route('teacher.courses.create')->with(['success' => __('course.successStoring')]);
        } else {
            return redirect()->route('teacher.courses.create')
                ->withInput()
                ->withErrors(['message' => __('course.failedStoring')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->courseService->getCourseById($id), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = $this->courseService->getCourseById($id);
        $categories = $this->categoryService->getCategories();
        return view('teacher.courses.edit', compact('course'), compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
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
}
