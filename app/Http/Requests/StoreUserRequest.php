<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            User::COL_NAME => 'required|string|min:1|max:255',
            User::COL_EMAIL => 'required|string|email|max:255|unique:users',
            User::COL_PASSWORD => 'required|min:6|max:255|confirmed',
            User::COL_ROLE_ID => 'required|exists:roles,id',
            User::COL_SPECIALTY => 'string|min:1|max:255',
            User::COL_LEVEL => 'string|min:1|max:255',
            User::COL_RELIABILITY => 'required|numeric|between:0,1',
        ];
    }

    public function attributes()
    {
        return [
            User::COL_NAME => __('user.name'),
            User::COL_EMAIL => __('user.email'),
            User::COL_ROLE_ID => __('user.role'),
            User::COL_SPECIALTY => __('user.specialty'),
            User::COL_LEVEL => __('user.level'),
            User::COL_PASSWORD => __('user.password'),
            User::COL_RELIABILITY => __('user.reliability'),
        ];
    }
}
