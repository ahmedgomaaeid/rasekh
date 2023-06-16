<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'required|unique:students',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'هذا الحقل مطلوب',
            'email.required' => 'هذا الحقل مطلوب',
            'email.email' => 'الحقل يجب ان يكون بريد الكتروني',
            'email.unique' => 'هذا الحقل موجود من قبل',
            'phone.required' => 'هذا الحقل مطلوب',
            'phone.unique' => 'هذا الحقل موجود من قبل',
            'photo.image' => 'الحقل يجب ان يكون صورة',
            'photo.mimes' => 'هذة الصيغة غير مدعومة',
            'password.required' => 'هذا الحقل مطلوب',
        ];
    }
}
