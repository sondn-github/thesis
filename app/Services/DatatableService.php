<?php


namespace App\Services;


use App\Category;
use App\Course;
use App\Criteria;
use App\Fact;
use App\Knowledge;
use App\Lesson;
use App\Post;
use App\Services\Interfaces\DatatableServiceInterface;
use App\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class DatatableService extends Service implements DatatableServiceInterface
{
    public function lessons($teacherId) {
        if (Auth::user()->role->name == 'admin') {
            $query = Lesson::select('lessons.*', 'courses.name as course_name')
                ->leftJoin('courses', 'courses.id','=','lessons.course_id');
        } else {
//            $courseIds = Course::where(Course::COL_USER_ID, $teacherId)
//                ->pluck(Course::COL_ID)
//                ->toArray();
            $query = $query = Lesson::select('lessons.*', 'courses.name as course_name')
                ->leftJoin('courses', 'courses.id','=','lessons.course_id')
                ->where('courses.user_id', $teacherId);
        }

        return DataTables::of($query)
            ->editColumn(Lesson::COL_CREATED_AT, function ($lesson) {
                return \Carbon\Carbon::parse($lesson->created_at)->format('d/m/Y');
            })
            ->make(true);
    }

    public function courses($teacherId) {
        $query = Course::with('category', 'lesson', 'user');
        if (!Auth::user()->isAdmin()) {
            $query = $query->where(Course::COL_USER_ID, $teacherId);
        }

        return DataTables::of($query)
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

    public function users() {
        $query = User::with('role');

        return DataTables::of($query)
            ->make(true);
    }

    public function categories() {
        $query = Category::all();

        return DataTables::of($query)
            ->make(true);
    }

    public function posts() {
        $query = Post::all();

        return DataTables::of($query)
            ->make(true);
    }
}
