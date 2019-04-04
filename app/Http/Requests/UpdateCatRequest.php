<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCatRequest extends FormRequest
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
            'name'=>'required|min:3|max:20|unique:categories,name,'.request()->segment(3),
            'description'=>'nullable|max:150|string',
            'img'=>'mimes:jpeg,bmp,png,jpg|nullable',
            'id_cat'=>'integer',
            'num_personal'=>'required|integer',
            'num_personal.integer'=>__('يجب أن يحوي حقل عدد المستفيدين على قيمة رقمية'),
            'num_personal.require'=>__('حقل عدد المستفيدين مطلوب'),
        ];
    }
    public function messages()
    {
        return [
            'name.require'=>__('حقل اسم القسم مطلوب'),
            'name.min'=>__('يجب ان يكون اسم القسم أكبر من 3 أحرف'),
            'name.max'=>__('لا يجب أن يتجاوز اسم القسم 20 حرف'),
            'name.unique'=>__('اسم القسم موجود مسبقا'),
            'description.max'=>__('يجب أن لا يتجاوز الوصف 150 حرفا'),
            'img.mimes'=>__('صيغة الملف غير صالحة الصيغ المدعومة (jpeg,bmp,png,jpg)'),
            'id_cat.integer'=>__('يجب أن يحوي حقل القسم الرئيسي على قيمة رقمية')
        ];
    }
}
