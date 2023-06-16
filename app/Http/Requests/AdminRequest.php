<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        return 
            [
                'name'=>'required|max:100',
                'email'=>'required|email|unique:admins,email',
                'password'=>'required|max:100',
            ];
    }
    public function messages()
    {
        return [
            'name.required'=>'هذا الحقل مطلوب',
            'name.max'=>'الحقل يجب ان يكون اقل من 100 حرف',
            'email.required'=>'هذا الحقل مطلوب',
            'email.email'=>'الحقل يجب ان يكون بريد الكتروني',
            'email.unique'=>'هذا البريد الالكتروني مستخدم من قبل',
            'password.required'=>'هذا الحقل مطلوب',
            'password.max'=>'الحقل يجب ان يكون اقل من 100 حرف',  
        ];
    }
}
