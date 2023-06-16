<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'name' => 'required|max:255',
            'main_category_id' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'هذا الحقل مطلوب',
            'name.max' => 'الحد الاقصى للحروف 255',
            'main_category_id.required' => 'هذا الحقل مطلوب',
            'photo.required' => 'هذا الحقل مطلوب',
            'photo.image' => 'هذا الحقل يجب ان يكون صورة',
            'photo.mimes' => 'هذا الحقل يجب ان يكون من نوع jpg,jpeg,png,gif',
        ];
    }
}
