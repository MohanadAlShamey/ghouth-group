<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
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
            'title'=>'required|min:5|max:50|string',
            'post'=>'required|min:20|max:5000|string',
            'excerpt'=>'required|min:20|max:150',
            'id_cat'=>'integer|required',
            'img1'=>'mimes:jpeg,bmp,png,jpeg|nullable',
            'img2'=>'mimes:jpeg,bmp,png,jpeg|nullable',
            'img3'=>'mimes:jpeg,bmp,png,jpeg|nullable',
            'img4'=>'mimes:jpeg,bmp,png,jpeg|nullable',
            'img5'=>'mimes:jpeg,bmp,png,jpeg|nullable',
            'img6'=>'mimes:jpeg,bmp,png,jpeg|nullable',
            'img7'=>'mimes:jpeg,bmp,png,jpeg|nullable',

            'url'=>'nullable|url'
        ];
    }
    public function messages()
    {
       return [
           'title.required'=>'حقل العنوان مطلوب',
           'title.min'=>'يجب أن يكون أكبر من 5 أحرف',
           'title.max'=>'يجب أن لا يتجاوز العنوان 50 حرف',
           'title.string'=>'يجب أن يكون محتوى العنوان نص',
           'excerpt.required'=>'حقل الإقتباس مطلوب',
           'excerpt.min'=>'يجب أن يكون أكبر من 20 أحرف',
           'excerpt.max'=>'يجب أن لا يتجاوز الإقتباس 150 حرف',
           'post.required'=>'حقل المقال مطلوب',
           'post.min'=>'يجب أن يكون حقل المقالة أكبر من 20 حرف',
           'post.max'=>'يجب أن لا تتجاوز المقالة 500 حرف',
           'post.string'=>'يجب أن يكون المحتوى نصي',
           'id_cat.required'=>'حقل القسم مطلوب',
           'id_cat.integer'=>'يجب أن يكون رقم',
          'img1:mimes'=>'الصيغة غير مدعومة',
          'img2:mimes'=>'الصيغة غير مدعومة',
          'img3:mimes'=>'الصيغة غير مدعومة',
          'img4:mimetypes'=>'الصيغة غير مدعومة',
           'url.url'=>'تأكد من المدخل يجب أن يكون بصيغة رابط مثال (https://youtube.com)'

       ];
    }
}
