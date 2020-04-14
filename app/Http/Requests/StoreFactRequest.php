<?php

namespace App\Http\Requests;

use App\Fact;
use Illuminate\Foundation\Http\FormRequest;

class StoreFactRequest extends FormRequest
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
            Fact::COL_CODE => 'required|max:255|unique:facts,code',
            Fact::COL_TYPE => 'required|exists:facts,type',
            Fact::COL_DESCRIPTION => 'required|max:65000',
        ];
    }

    public function attributes()
    {
        return [
            Fact::COL_CODE => __('fact.code'),
            Fact::COL_TYPE => __('fact.type'),
            Fact::COL_DESCRIPTION => __('fact.description'),
        ];
    }
}
