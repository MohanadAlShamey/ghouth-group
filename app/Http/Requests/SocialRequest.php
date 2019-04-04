<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialRequest extends FormRequest
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
            'face'=>'nullable|url',
            'twit'=>'nullable|url',
            'google'=>'nullable|url',
            'lenk'=>'nullable|url',
            'youtube'=>'nullable|url',

        ];
    }
}
