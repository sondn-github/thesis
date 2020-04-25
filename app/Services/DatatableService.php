<?php


namespace App\Services;


use App\Course;
use App\Criteria;
use App\Fact;
use App\Knowledge;
use App\Lesson;
use App\Services\Interfaces\DatatableServiceInterface;
use Symfony\Component\VarDumper\Cloner\Data;
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
            ->editColumn(Lesson::COL_CREATED_AT, function ($lesson) {
                return \Carbon\Carbon::parse($lesson->created_at)->format('d/m/Y');
            })
            ->addColumn('action', function ($lesson) {
                return '<a href="'.route("teacher.lesson.getLessonOfTeacher", $lesson->id).'" class="btn btn-info btn-info-lesson" data-id="'.$lesson->id.'" data-toggle="modal" data-target="#detailLesson" onclick="showInfoModal(this)"><i class="fa fa-info-circle"></i></a>
                        <a href="'.route("teacher.lesson.edit", $lesson->id).'" class="btn btn-warning margin-r-5"><i class="fa fa-edit"></i></a>
                        <a href="javascript:void(0)" data-id="' . $lesson->id . '" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></a>';
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function courses($teacherId) {
        $query = Course::with('category', 'lesson')
            ->where(Course::COL_USER_ID, $teacherId);

        return DataTables::of($query)
            ->addColumn('action', function ($course) {
                return '<a href="'.route("teacher.courses.show", $course->id).'" class="btn btn-info btn-info-lesson" data-id="'.$course->id.'" data-toggle="modal" data-target="#courseDetail" onclick="showInfoModal(this)"><i class="fa fa-info-circle"></i></a>
                        <a href="'.route("teacher.courses.edit", $course->id).'" class="btn btn-warning margin-r-5"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-success margin-r-5" data-id="' . $course->id . '" data-toggle="modal" data-target="#adviseModal" onclick="showAdviseModel(this)"><i class="fa fa-commenting"></i></a>
                        <a href="javascript:void(0)" data-id="' . $course->id . '" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></a>';
            })
            ->addColumn('number_lessons', function ($course) {
               return count($course->lesson);
            })
            ->editColumn(Course::COL_CREATED_AT, function ($course) {
                return \Carbon\Carbon::parse($course->created_at)->format('d/m/Y');
            })
            ->make(true);
    }

    public function criteria() {
        $query = Criteria::with('type')
            ->orderBy(Criteria::COL_ID, 'asc');

        return DataTables::of($query)
            ->editColumn(Criteria::COL_STATUS, function ($criteria) {
                if ($criteria->status == Criteria::ACTIVE_STATUS) {
                    return '<label class="switch small">
                                <input type="checkbox" name="status" data-id="'.$criteria->id.'" checked>
                                <span class="slider round"></span>
                            </label>';
                } else {
                    return '<label class="switch">
                                <input type="checkbox" data-id="'.$criteria->id.'" name="status">
                                <span class="slider round"></span>
                            </label>';
                }
            })
            ->addColumn('action', function ($criteria) {
                return '<a href="'.route("expert.criteria.show", $criteria->id).'" class="btn btn-info btn-info-criteria" data-id="'.$criteria->id.'" data-toggle="modal" data-target="#criteriaModal" onclick="showInfoModal(this)"><i class="fa fa-info-circle"></i></a>
                        <a href="'.route("expert.criteria.edit", $criteria->id).'" class="btn btn-warning margin-r-5"><i class="fa fa-edit"></i></a>';
            })
            ->rawColumns(['action', Criteria::COL_STATUS])
            ->make(true);
    }

    public function facts() {
        $query = Fact::all();

        return DataTables::of($query)
            ->editColumn(Fact::COL_TYPE, function ($fact) {
                if ($fact->type == Fact::TYPE_COMMENT) {
                    return __('fact.comment');
                } else {
                    return __('fact.advise');
                }
            })
            ->make(true);
    }

    public function rulesType1() {
        $query = Knowledge::where(Knowledge::COL_TYPE, Knowledge::TYPE_1);

        return DataTables::of($query)
            ->make(true);
    }

    public function rulesType2() {
        $query = Knowledge::where(Knowledge::COL_TYPE, Knowledge::TYPE_2);

        return DataTables::of($query)
            ->make(true);
    }
}
