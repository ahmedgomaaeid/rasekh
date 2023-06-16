<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'email' => 'required|email|unique:teachers',
            'phone' => 'required|unique:teachers',
            'description' => 'required',
            'sections' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'password' => 'required',
            'sections' => 'required',
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
            'description.required' => 'هذا الحقل مطلوب',
            'sections.required' => 'هذا الحقل مطلوب',
            'photo.image' => 'الحقل يجب ان يكون صورة',
            'photo.mimes' => 'هذة الصيغة غير مدعومة',
            'password.required' => 'هذا الحقل مطلوب',
            'sections.required' => 'هذا الحقل مطلوب',
        ];
    }
}