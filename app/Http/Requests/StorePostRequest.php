<?php

namespace App\Http\Requests;

use App\Post;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            Post::COL_TITLE => 'required|max:65000',
            Post::COL_CONTENT => 'required',
        ];
    }

    public function attributes()
    {
        return [
            Post::COL_TITLE => __('post.title'),
            Post::COL_CONTENT => __('post.content'),
        ];
    }
}
