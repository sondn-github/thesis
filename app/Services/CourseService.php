<?php


namespace App\Services;


use App\Course;
use App\Services\Interfaces\CourseServiceInterface;

class CourseService extends Service implements CourseServiceInterface
{
    public function getCoursesByUserId($userId) {
        return Course::where(Course::COL_USER_ID, $userId)
            ->get();
    }
}
