<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $student = Auth::guard('student')->user();
        return view('student.profile.main', compact('student'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|unique:students,phone,' . Auth::guard('student')->user()->id,
        ]);
        $student = Student::find(Auth::guard('student')->user()->id);
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->save();
        return back()->with('success', 'تم تعديل البيانات بنجاح');
    }
    public function password()
    {
        return view('student.profile.password');
    }
    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string|min:8',
            'password' => 'required|string|min:8',
        ]);
        $student = Student::find(Auth::guard('student')->user()->id);
        if (password_verify($request->old_password, $student->password)) {
            $student->password = bcrypt($request->password);
            $student->save();
            return back()->with('success', 'تم تعديل كلمة المرور بنجاح');
        } else {
            return back()->with('status', 'كلمة المرور القديمة غير صحيحة');
        }
    }
    public function image()
    {
        return view('student.profile.photo');
    }
    public function imageUpdate(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp,ico,cur,bmp',
        ]);
        $student = Student::find(Auth::guard('student')->user()->id);
        if($student->photo != ''){
            unlink('assets/images/students/'.$student->photo);
        }
        $file_extension = $request->file('photo')->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $request->file('photo')->move('assets/images/students', $file_name);
        $student->photo = $file_name;
        $student ->save();
        return redirect()->back()->with('success', 'تم تغيير الصورة الشخصية بنجاح');
    }
}
