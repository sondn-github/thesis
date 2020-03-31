<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            User::COL_NAME => 'min:1|max:255',
            User::COL_SPECIALTY => 'min:1|max:255',
            User::COL_LEVEL => 'min:1|max:255',
        ];
    }

    public function attributes()
    {
        return [
            User::COL_NAME => __('name'),
            User::COL_SPECIALTY => __('specialty'),
            User::COL_LEVEL => __('level'),
        ];
    }
}
