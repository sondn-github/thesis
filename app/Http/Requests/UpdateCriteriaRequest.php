<?php

namespace App\Http\Requests;

use App\Criteria;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCriteriaRequest extends FormRequest
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
            Criteria::COL_NAME => 'required|max:255',
            Criteria::COL_DESCRIPTION => 'max:65000',
            Criteria::COL_EXAMPLE => 'max:65000',
            Criteria::COL_EXPLAIN => 'max:65000',
            Criteria::COL_WEIGHT => 'required|numeric|between:0,1',
        ];
    }

    public function attributes()
    {
        return [
            Criteria::COL_NAME => __('criteria.name'),
            Criteria::COL_DESCRIPTION => __('criteria.description'),
            Criteria::COL_EXPLAIN => __('criteria.explain'),
            Criteria::COL_EXAMPLE => __('criteria.example'),
            Criteria::COL_WEIGHT => __('criteria.weight'),
        ];
    }
}
