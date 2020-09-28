<?php

namespace App\Http\Requests\Skill\Store;

use Illuminate\Foundation\Http\FormRequest;

class SkillStore extends FormRequest
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
            'name'=>'required|max:255|unique:skills,name',
        ];
    }

    public function messages(){
        return [
            'name.required'=>'this field must be required',
            // 'name.regex'=>'this field must be String',
            'name.max'=>'this field must be less than character',
            'name.unique'=>'this field is Already Taken',
        ];
    }
}