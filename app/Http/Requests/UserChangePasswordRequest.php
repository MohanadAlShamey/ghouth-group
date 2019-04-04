<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserChangePasswordRequest extends FormRequest
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
            'password'=>'required|min:6|max:20',

            'confirm' => 'required_with:password|same:password|min:6'
        ];
    }
    public function messages()
    {
        return[
            'password.required'=>__('حقل كلمة المرور مطلوب'),
            'password.min'=>__('يجب أن تكون كلمة المرور أكبر من 6 أحرف'),
            'password.max'=>__('يجب أن لا تزيد كلمة المرور عن 20 حرف'),
            'confirm.same'=>__('كلمة المرور غير متطابقة')
        ];
    }
}
