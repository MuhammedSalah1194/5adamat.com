<?php

namespace App\Http\Requests\Video\Store;

use Illuminate\Foundation\Http\FormRequest;

class VideoStore extends FormRequest
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
            'image'=>'required|image|mimes:jpg,jpeg,png,gif',
        ];
    }

    public function messages(){
        return[
            'name.required'=>'this field must be required',
            'youtube.required'=>'this field must be required',
            'published.required'=>'this field must be required',
            'image.required'=>'this field must be required',
            'name.max'=>'this field must be less than character',
            'name.unique'=>'this field is Already Taken',
            'keywords.max'=>'this field must be more than character',
            'desc.max'=>'this field must be more than character',
            'meta_desc.max'=>'this field must be more than character',
        ];
    }
}