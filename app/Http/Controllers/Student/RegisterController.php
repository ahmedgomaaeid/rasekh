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
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'phone' => 'required|numeric|unique:students',
            'password' => 'required|string|min:6',
        ]);
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = bcrypt($request->password);
        $student->phone = $request->phone;
        $student->remember_token = generateRandomString();
        $student->save();
        //send email
        Mail::to($student->email)->send(new StudentVerify($student));

        Auth::guard('student')->login($student);
        return redirect()->intended(route('index'));
    }
    public function verify($token)
    {
        $student = Student::where('remember_token', $token)->first();
        if ($student) {
            $student->email_verified_at = now();
            $student->save();
            return redirect()->route('login')->with('success', 'تم تفعيل الحساب بنجاح');
        } else {
            return redirect()->route('login')->with('status', 'الرابط غير صالح');
        }
    }
}
