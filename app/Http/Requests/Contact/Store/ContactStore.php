<?php

namespace App\Http\Requests\Contact\Store;

use Illuminate\Foundation\Http\FormRequest;

class ContactStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *s
     * @return array
     */
    public function rules(){
        
        return [
            'name'=>'required|max:255|unique:contacts,name,'.$this->id,
            'email'=>'required|unique:contacts,email'. $this->user,
            'message'=>'required|max:255|max:500',
        ];

    }

}