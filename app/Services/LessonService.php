<?php


namespace App\Services;


use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Services\Interfaces\LessonServiceInterface;
use App\Lesson;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LessonService extends Service implements LessonServiceInterface
{
    public function getLesson($id) {
        return Lesson::with('course')
            ->where(Lesson::COL_ID, $id)
            ->first();
    }

    public function getLessonDetailById($id) {
        $lessonDetail = Lesson::with('course')
            ->where(Lesson::COL_ID, $id)
            ->where(Lesson::COL_STATUS, Lesson::ACTIVE_STATUS)
            ->get();

        return $lessonDetail[0];
    }

    public function getAll()
    {
        return Lesson::with('course')
            ->where(Lesson::COL_STATUS, Lesson::ACTIVE_STATUS)
            ->paginate(6);
    }

    public function increaseView($id)
    {
        $lesson = Lesson::find($id);
        $lesson->view += 1;
        $lesson->save();
    }

    public function getLessonByName($name)
    {
        return Lesson::with('course')
            ->where(Lesson::COL_NAME, 'like', '%'.$name.'%')
            ->where(Lesson::COL_STATUS, Lesson::ACTIVE_STATUS)
            ->paginate(6);
    }

    public function store(StoreLessonRequest $request) {
        $path = Str::after($request->file('file')->store('public/files'), 'public/');
        $path = 'storage/'.$path;

        return Lesson::create([
            Lesson::COL_NAME => $request->input(Lesson::COL_NAME),
            Lesson::COL_COURSE_ID => $request->input(Lesson::COL_COURSE_ID),
            Lesson::COL_ABSTRACT => $request->input(Lesson::COL_ABSTRACT),
            Lesson::COL_DESCRIPTION => $request->input(Lesson::COL_DESCRIPTION),
            Lesson::COL_FILE => $path,
        ]);
    }

    public function getLessonOfTeacher($lessonId, $teacherId) {
        $lesson = DB::table('lessons')
            ->select('lessons.*', 'courses.name as course_name')
            ->join('courses', 'lessons.course_id', 'courses.id')
            ->where('lessons.id', $lessonId)
            ->where('courses.user_id', $teacherId)
            ->first();

        return $lesson;
    }

    public function update(UpdateLessonRequest $request, $teacherId) {
        if ($this->getLessonOfTeacher($request->id, $teacherId)) {
            return Lesson::findOrFail($request->id)
                ->update([
                    Lesson::COL_NAME => $request->input(Lesson::COL_NAME),
                    Lesson::COL_COURSE_ID => $request->input(Lesson::COL_COURSE_ID),
                    Lesson::COL_ABSTRACT => $request->input(Lesson::COL_ABSTRACT),
                    Lesson::COL_DESCRIPTION => $request->input(Lesson::COL_DESCRIPTION),
                ]);

        }
    }

    public function changeStatus($request, $teacherId) {
        if (Auth::user()->role->name == 'admin') {
            return Lesson::findOrFail($request->id)
                ->update([
                    Lesson::COL_STATUS => $request->input(Lesson::COL_STATUS),
                ]);
        } elseif ($this->getLessonOfTeacher($request->id, $teacherId)) {
            return Lesson::findOrFail($request->id)
                ->update([
                    Lesson::COL_STATUS => $request->input(Lesson::COL_STATUS),
                ]);
        } else {
            return null;
        }
    }

    public function destroy($request, $teacherId) {
        if (Auth::user()->role->name == 'admin') {
            return Lesson::findOrFail($request)
                ->delete();
        } elseif ($this->getLessonOfTeacher($request->id, $teacherId)) {
            return Lesson::findOrFail($request->id)
                ->delete();
        } else {
            return null;
        }
    }

    public function getLessonsByCourseId($courseId)
    {
        return Lesson::where(Lesson::COL_COURSE_ID, $courseId)
            ->get();
    }
}
