<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('student.auth.login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (auth()->guard('student')->attempt(['email' => request('email'), 'password' => request('password')])) {
            return redirect()->intended(route('index'));
        }
        return redirect()->back()->withInput($request->only('email'))->with('status', 'البيانات التي ادخلتها غير صحيحة');
    }
    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect()->intended(route('index'));
    }
}
