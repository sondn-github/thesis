<?php

namespace App\Observers;

use App\Course;

class CourseObserver
{
    public function deleting(Course $course)
    {
        $course->lesson()->delete();
    }
}
