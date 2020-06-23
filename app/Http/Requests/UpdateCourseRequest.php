<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Course;

class UpdateCourseRequest extends FormRequest
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
            Course::COL_NAME => 'required|max:255',
            Course::COL_DESCRIPTION => 'required|max:65000',
            'category_name' => 'required',
            Course::COL_LINK => 'nullable|url',
        ];
    }

    public function attributes()
    {
        return [
            Course::COL_NAME => __('course.name'),
            Course::COL_DESCRIPTION => __('course.description'),
            'category_name' => __('course.category'),
            Course::COL_LINK => __('course.link'),
        ];
    }
}
