<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('teacher.auth.login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (auth()->guard('teacher')->attempt(['email' => request('email'), 'password' => request('password')])) {
            return redirect()->route('get.teacher.dashboard');
        }
        return redirect()->back()->with('status', 'البريد الالكتروني او كلمة المرور غير صحيحة');
    }
    public function logout()
    {
        auth()->guard('teacher')->logout();
        return redirect()->route('get.teacher.login');
    }
    public function getRegister()
    {
        return view('teacher.auth.register');
    }
    public function register(Request $request)
    {
        $file_name = '';
        if($request->hasFile('photo')){
            $file_extension = $request->file('photo')->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $request->file('photo')->move('assets/images/teachers', $file_name);
        }
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->password = bcrypt($request->password);
        $teacher->phone = $request->phone;
        $teacher->description = $request->description;
        $teacher->photo = $file_name;
        $teacher->save();
        Auth::guard('teacher')->login($teacher);
        return redirect()->route('get.teacher.dashboard');
    }
}
