<?php

namespace App\Http\Requests;

use App\Knowledge;
use Illuminate\Foundation\Http\FormRequest;

class StoreRuleType2Request extends FormRequest
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
            Knowledge::COL_CODE => 'required|unique:knowledge,code',
            Knowledge::COL_CONCLUSION => 'required|exists:facts,code',
            Knowledge::COL_RELIABILITY => 'required|numeric|between:0,1',
            Knowledge::COL_STATUS => 'required|boolean',
        ];
        foreach ($this->request->get('facts') as $key => $value) {
            $rules['facts.'.$key] = 'required|exists:facts,code';
        }
        foreach ($this->request->get('scoresFrom') as $key => $value) {
            $rules['scoresFrom.'.$key] = 'required|numeric|between:0,1|lte:scoresTo.'.$key;
        }
        foreach ($this->request->get('scoresTo') as $key => $value) {
            $rules['scores.'.$key] = 'required|numeric|between:0,1';
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            Knowledge::COL_CODE => __('knowledge.code'),
            Knowledge::COL_CONCLUSION => __('knowledge.conclusion'),
            Knowledge::COL_RELIABILITY => __('knowledge.reliability'),
            Knowledge::COL_STATUS => __('knowledge.status'),
        ];
    }

    public function messages()
    {
        $messages = [];

        foreach($this->request->get('facts') as $key => $val)
        {
            $messages['facts.'.$key.'.required'] = '"'.__('knowledge.criteria').' số '.($key + 1).'" là cần thiết.';
            $messages['facts.'.$key.'.exists'] = '"'.__('knowledge.criteria').' số '.($key + 1).'" là không tồn tại.';
        }
        foreach($this->request->get('scoresFrom') as $key => $val)
        {
            $messages['scoresFrom.'.$key.'.required'] = '"'.__('knowledge.scoreRangeFrom').' số '.($key + 1).'" là cần thiết.';
            $messages['scoresFrom.'.$key.'.numeric'] = '"'.__('knowledge.scoreRangeFrom').' số '.($key + 1).'" không hợp lệ.';
            $messages['scoresFrom.'.$key.'.between'] = '"'.__('knowledge.scoreRangeFrom').' số '.($key + 1).'" phải thuộc khoảng từ :min đến :max.';
            $messages['scoresFrom.'.$key.'.lte'] = '"'.__('knowledge.scoreRangeFrom').' số '.($key + 1).'" phải nhỏ hơn hoặc bằng '.__('knowledge.scoreRangeTo');
        }
        foreach($this->request->get('scoresTo') as $key => $val)
        {
            $messages['scoresTo.'.$key.'.required'] = '"'.__('knowledge.scoreRangeTo').' số '.($key + 1).'" là cần thiết.';
            $messages['scoresTo.'.$key.'.numeric'] = '"'.__('knowledge.scoreRangeTo').' số '.($key + 1).'" phải là kiểu số.';
            $messages['scoresTo.'.$key.'.between'] = '"'.__('knowledge.scoreRangeTo').' số '.($key + 1).'" phải thuộc khoảng từ :min đến :max.';
        }

        return $messages;
    }
}
