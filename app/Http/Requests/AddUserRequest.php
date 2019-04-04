<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->role=='admin'){
            return true;
        }
        return false;
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
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:20',
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
            'password.required'=>__('حقل كلمة المرور مطلوب'),
            'password.min'=>__('يجب أن تكون كلمة المرور أكبر من 6 أحرف'),
            'password.max'=>__('يجب أن لا تزيد كلمة المرور عن 20 حرف'),
            'role.require'=>__('حقل الرتبة مطلوب'),
            'role.string'=>__('إدخال خاطئ في حقل الرتبة'),
        ];
    }
}
