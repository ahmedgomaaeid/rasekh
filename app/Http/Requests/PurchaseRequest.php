<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'student_id' => 'required',
            'course_id' => 'required',
            'finnished_at' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'student_id.required' => 'هذا الحقل مطلوب',
            'course_id.required' => 'هذا الحقل مطلوب',
            'finnished_at.required' => 'هذا الحقل مطلوب',
        ];
    }
}
