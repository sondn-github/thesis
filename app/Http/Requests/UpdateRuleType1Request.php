<?php

namespace App\Http\Requests;

use App\Knowledge;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRuleType1Request extends FormRequest
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
        $rules = [
            Knowledge::COL_CONCLUSION => 'required|exists:facts,id',
            Knowledge::COL_RELIABILITY => 'required|numeric|between:0,1',
            Knowledge::COL_STATUS => 'required|boolean',
        ];
        foreach ($this->request->get('criteria') as $key => $value) {
            $rules['criteria.'.$key] = 'required|exists:criterias,id';
        }
        foreach ($this->request->get('operators') as $key => $value) {
            $rules['operators.'.$key] = 'required|numeric|between:0,3';
        }
        foreach ($this->request->get('scores') as $key => $value) {
            $rules['scores.'.$key] = 'required|numeric|between:0,1';
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            Knowledge::COL_CONCLUSION => __('knowledge.conclusion'),
            Knowledge::COL_RELIABILITY => __('knowledge.reliability'),
            Knowledge::COL_STATUS => __('knowledge.status'),
        ];
    }

    public function messages()
    {
        $messages = [];
        foreach($this->request->get('criteria') as $key => $val)
        {
            $messages['criteria.'.$key.'.required'] = '"'.__('knowledge.criteria').' số '.($key + 1).'" là cần thiết.';
            $messages['criteria.'.$key.'.exists'] = '"'.__('knowledge.criteria').' số '.($key + 1).'" là không tồn tại.';
        }
        foreach($this->request->get('operators') as $key => $val)
        {
            $messages['operators.'.$key.'.required'] = '"'.__('knowledge.operator').' số '.($key + 1).'" là cần thiết.';
            $messages['operators.'.$key.'.numeric'] = '"'.__('knowledge.operator').' số '.($key + 1).'" không hợp lệ.';
            $messages['operators.'.$key.'.between'] = '"'.__('knowledge.operator').' số '.($key + 1).'" không hợp lệ.';
        }
        foreach($this->request->get('scores') as $key => $val)
        {
            $messages['scores.'.$key.'.required'] = '"'.__('knowledge.score').' số '.($key + 1).'" là cần thiết.';
            $messages['operators.'.$key.'.numeric'] = '"'.__('knowledge.score').' số '.($key + 1).'" phải là kiểu số.';
            $messages['scores.'.$key.'.between'] = '"'.__('knowledge.score').' số '.($key + 1).'" phải thuộc khoảng từ :min đến :max.';
        }

        return $messages;
    }
}
