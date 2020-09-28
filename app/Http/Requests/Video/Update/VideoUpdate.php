<?php

namespace App\Http\Requests\Video\Update;

use Illuminate\Foundation\Http\FormRequest;

class VideoUpdate extends FormRequest
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
    public function rules(){
        return [
            'name'=>'required|unique:pages,name,'.$this->id,
            'keywords'=>'max:191',
            'desc'=>'max:191',
            'meta_desc'=>'max:191',
            'youtube'=>'required|min:10,url',
            'published'=>'required',
            'cat_id'=>'required|integer',
            'image'=>'sometimes|nullable|image|mimes:jpg,jpeg,png,gif',
        ];
    }
}
