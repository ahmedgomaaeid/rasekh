<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Mail\StudentVerify;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function index()
    {
        return view('student.auth.register');
    }
    public function register(Request $request)
    {
        //make validation with messages
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'password' => 'required|confirmed|min:8',
            'phone' => 'required|numeric',
        ], [
            'name.required' => 'الاسم مطلوب',
            'name.string' => 'الاسم يجب ان يكون نص',
            'name.max' => 'الاسم يجب ان لا يزيد عن 255 حرف',
            'email.required' => 'البريد الالكتروني مطلوب',
            'email.email' => 'البريد الالكتروني يجب ان يكون بريد الكتروني',
            'email.unique' => 'البريد الالكتروني مستخدم من قبل',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.confirmed' => 'كلمة المرور غير متطابقة',
            'password.min' => 'كلمة المرور يجب ان لا تقل عن 8 احرف',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.numeric' => 'رقم الهاتف يجب ان يكون ارقام فقط',
        ]);
        

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = bcrypt($request->password);
        $student->phone = $request->phone;
        $student->token = generateRandomString();
        $student->save();
        //send email
        Mail::to($student->email)->send(new StudentVerify($student));

        Auth::guard('student')->login($student);
        return redirect()->intended(route('index'));
    }
    public function verify($token)
    {
        $student = Student::where('token', $token)->first();
        if ($student) {
            $student->email_verified_at = now();
            $student->save();
            return redirect()->route('login')->with('success', 'تم تفعيل الحساب بنجاح');
        } else {
            return redirect()->route('login')->with('status', 'الرابط غير صالح');
        }
    }
}
