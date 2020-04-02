<?php


namespace App\Services;


use App\Http\Requests\StoreLessonRequest;
use App\Services\Interfaces\LessonServiceInterface;
use App\Lesson;
use Illuminate\Support\Str;

class LessonService extends Service implements LessonServiceInterface
{
    public function getPopularLessons() {
        $popularLessons = Lesson::with('course')
            ->where(Lesson::COL_STATUS, Lesson::ACTIVE_STATUS)
            ->orderBy(Lesson::COL_VIEW, 'desc')
            ->limit(5)
            ->get();

        return $popularLessons;
    }

    public function getLessonDetailById($id) {
        $lessonDetail = Lesson::with('course')
            ->where(Lesson::COL_ID, $id)
            ->get();

        return $lessonDetail[0];
    }

    public function getAll()
    {
        return Lesson::with('course')
            ->where(Lesson::COL_STATUS, Lesson::ACTIVE_STATUS)
            ->get();
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
            ->get();
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
}
