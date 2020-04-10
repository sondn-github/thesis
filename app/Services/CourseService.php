<?php


namespace App\Services;


use App\Course;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Services\Interfaces\CourseServiceInterface;

class CourseService extends Service implements CourseServiceInterface
{
    public function getCoursesByUserId($userId) {
        return Course::where(Course::COL_USER_ID, $userId)
            ->get();
    }

    public function getCourseById($courseId) {
        return Course::with('category', 'lesson')
            ->where(Course::COL_ID, $courseId)
            ->first();
    }

    public function update(UpdateCourseRequest $request, $id) {
        return Course::findOrFail($id)->update([
            Course::COL_NAME => $request->input(Course::COL_NAME),
            Course::COL_CATEGORY_ID => $request->input(Course::COL_CATEGORY_ID),
            Course::COL_DESCRIPTION => $request->input(Course::COL_DESCRIPTION),
        ]);
    }

    public function destroy($id) {
        return Course::findOrFail($id)->delete();
    }

    public function store(StoreCourseRequest $request, $teacherId) {
        return Course::create([
            Course::COL_NAME => $request->input(Course::COL_NAME),
            Course::COL_CATEGORY_ID => $request->input(Course::COL_CATEGORY_ID),
            Course::COL_DESCRIPTION => $request->input(Course::COL_DESCRIPTION),
            Course::COL_USER_ID => $teacherId,
        ]);
    }
}
