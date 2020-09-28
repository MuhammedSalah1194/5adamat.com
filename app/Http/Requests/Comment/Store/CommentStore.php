<?php

namespace App\Http\Requests\Comment\Store;

use Illuminate\Foundation\Http\FormRequest;

class CommentStore extends FormRequest
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
            'comment'=>'required|max:200',
            'video_id'=>'required|integer',
        ];
    }
}
