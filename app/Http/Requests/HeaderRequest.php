<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeaderRequest extends FormRequest
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
            'img'=>'mimes:jpeg,bmp,png,jpeg|nullable',
            'title_header'=>'required|min:10|max:50',
            'description_header'=>'required|min:10|max:200',
        ];
    }
}
