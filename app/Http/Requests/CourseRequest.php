<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'price' => 'required|numeric',
            'teacher_percentage' => 'required|numeric',
            'finnish_after' => 'required|numeric',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'هذا الحقل مطلوب',
            'image.required' => 'هذا الحقل مطلوب',
            'image.image' => 'هذا الحقل يجب ان يكون صورة',
            'image.mimes' => 'هذة الصيغة غير صحيحة',
            'price.required' => 'هذا الحقل مطلوب',
            'price.numeric' => 'هذا الحقل يجب ان يكون رقم',
            'teacher_percentage.required' => 'هذا الحقل مطلوب',
            'teacher_percentage.numeric' => 'هذا الحقل يجب ان يكون رقم',
            'finnish_after.required' => 'هذا الحقل مطلوب',
            'finnish_after.numeric' => 'هذا الحقل يجب ان يكون رقم',
            'category_id.required' => 'هذا الحقل مطلوب',
        ];
    }
}
