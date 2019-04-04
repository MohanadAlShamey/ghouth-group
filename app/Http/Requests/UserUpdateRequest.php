<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name'=>'required|min:3|max:15|string',
            'email'=>'required|email|unique:users,email,'.request()->segment(3),
            'role'=>'required|string'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>__('حقل الاسم مطلوب'),
            'name.min'=>__('يجب أن يكون الاسم أكبر من 3 أحرف'),
            'name.max'=>__('يجب أن لا يزيد الاسم عن 15 حرف'),
            'name.string'=>__('يجب أن يكون حقل الاسم نصي'),
            "email.required"=>__('حقل البريد الإلكتروني مطلوب'),
            "email.email"=>__(' البريد الإلكتروني غير صحيح'),
            'email.unique'=>__(' البريد الإلكتروني المدخل مستخدم من قبل '),

            'role.require'=>__('حقل الرتبة مطلوب'),
            'role.string'=>__('إدخال خاطئ في حقل الرتبة'),
        ];
    }
}
