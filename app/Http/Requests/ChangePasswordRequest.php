<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'oldPassword' => 'required|min:6|max:255',
            'newPassword' => 'required|min:6|max:255',
            'confirmationPassword' => 'required|min:6|max:255|same:newPassword',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'oldPassword' => __('profile.oldPassword'),
            'newPassword' => __('profile.newPassword'),
            'confirmationPassword' => __('profile.confirmationPassword'),
        ];
    }
}
