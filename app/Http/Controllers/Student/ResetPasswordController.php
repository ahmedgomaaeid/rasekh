<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPassword;
use App\Models\ResetPassword;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('student.auth.resetPassword');
    }
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:students,email',
        ]);
        $token = generateRandomString();
        $reset = new ResetPassword();
        $reset->token = $token;
        $reset->email = $request->email;
        $reset->save();
        //send email
        Mail::to($request->email)->send(new ForgetPassword($token));
        return redirect()->route('login')->with('success', 'تم ارسال رابط استعادة كلمة المرور الى بريدك الالكتروني');
    }
    public function reset($token)
    {
        $reset = ResetPassword::where('token', $token)->first();
        if ($reset) {
            return view('student.auth.resetPasswordForm', compact('token'));
        } else {
            return redirect()->route('login')->with('status', 'الرابط غير صالح');
        }
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6',
        ]);
        $reset = ResetPassword::where('token', $request->token)->first();
        if ($reset) {
            $student = Student::where('email', $reset->email)->first();
            $student->password = bcrypt($request->password);
            $student->save();
            $reset->delete();
            return redirect()->route('login')->with('success', 'تم تغيير كلمة المرور بنجاح');
        } else {
            return redirect()->route('login')->with('status', 'الرابط غير صالح');
        }
    }
}
