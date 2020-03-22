<?php


namespace App\Services;


use App\Services\Interfaces\LessonServiceInterface;
use App\Lesson;

class LessonService extends Service implements LessonServiceInterface
{
    public function getPopularLessons() {
        $popularLessons = Lesson::with('category')
            ->where(Lesson::COL_STATUS, Lesson::ACTIVE_STATUS)
            ->orderBy(Lesson::COL_VIEW, 'desc')
            ->limit(5)
            ->get();

        return $popularLessons;
    }

    public function getLessonDetailById($id) {
        $lessonDetail = Lesson::with('category', 'user')
            ->where(Lesson::COL_ID, $id)
            ->get();

        return $lessonDetail[0];
    }

    public function getAll()
    {
        return Lesson::with('category', 'user')
            ->where(Lesson::COL_STATUS, Lesson::ACTIVE_STATUS)
            ->get();
    }

    public function increaseView($id)
    {
        $lesson = Lesson::find($id);
        $lesson->view += 1;
        $lesson->save();
    }
}
