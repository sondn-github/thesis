<?php

namespace App\Http\Requests;

use App\Lesson;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            Lesson::COL_NAME => 'required|max:255',
            Lesson::COL_ABSTRACT => 'required|max:65000',
            Lesson::COL_DESCRIPTION => 'required|max:65000',
            Lesson::COL_FILE => 'max:1024000|mimes:pdf,mp4',
            Lesson::COL_COURSE_ID => 'required|exists:courses,id',
        ];
    }

    public function attributes()
    {
        return [
            Lesson::COL_NAME => __('lesson.name'),
            Lesson::COL_ABSTRACT => __('lesson.abstract'),
            Lesson::COL_DESCRIPTION => __('lesson.description'),
            Lesson::COL_FILE => __('lesson.file'),
            Lesson::COL_COURSE_ID => __('lesson.course'),
        ];
    }
}
