<?php


namespace App\Services;


use App\Course;
use App\Lesson;
use App\Services\Interfaces\DatatableServiceInterface;
use Yajra\DataTables\DataTables;

class DatatableService extends Service implements DatatableServiceInterface
{
    public function lessons($teacherId) {
        $courseIds = Course::where(Course::COL_USER_ID, $teacherId)
            ->pluck(Course::COL_ID)
            ->toArray();
        $query = Lesson::with('course')
            ->whereIn(Lesson::COL_COURSE_ID, $courseIds);

        return DataTables::of($query)
            ->editColumn('status', function ($lesson) {
                if ($lesson->status == 1) {
                    return '<label class="switch small">
                                <input type="checkbox" name="status" data-id="'.$lesson->id.'" checked>
                                <span class="slider round"></span>
                            </label>';
                } else {
                    return '<label class="switch">
                                <input type="checkbox" data-id="'.$lesson->id.'" name="status">
                                <span class="slider round"></span>
                            </label>';
                }
            })
            ->addColumn('action', function ($lesson) {
                return '<a href="'.route("teacher.lesson.getLessonOfTeacher", $lesson->id).'" class="btn btn-xs btn-info btn-info-lesson" data-id="'.$lesson->id.'" data-toggle="modal" data-target="#detailLesson" onclick="showInfoModal(this)"><i class="fa fa-info-circle"></i></a>
                        <a href="'.route("teacher.lesson.edit", $lesson->id).'" class="btn btn-warning margin-r-5"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-success margin-r-5"><i class="fa fa-commenting"></i></a>
                        <a href="javascript:void(0)" data-id="' . $lesson->id . '" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-trash"></i></a>';
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }
}
