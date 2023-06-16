<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Notify;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $teacher = Teacher::find(Auth::guard('teacher')->user()->id);
        return view('teacher.profile.index', compact('teacher'));
    }
    public function updatePassword(Request $request)
    {
        $teacher = Teacher::find(Auth::guard('teacher')->user()->id);
        if (password_verify($request->old_password, $teacher->password)) {
            $teacher->password = bcrypt($request->password);
            $teacher->save();
            return redirect()->back()->with('success', 'تم تغيير كلمة المرور بنجاح');
        }else
            return redirect()->back()->with('status', 'كلمة المرور القديمة غير صحيحة');  
    }
    public function updateImage(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        $teacher = Teacher::find(Auth::guard('teacher')->user()->id);
        if($teacher->photo != ''){
            unlink('assets/images/teachers/'.$teacher->photo);
        }
        $file_extension = $request->file('photo')->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $request->file('photo')->move('assets/images/teachers', $file_name);
        $teacher->photo = $file_name;
        $teacher ->save();
        return redirect()->back()->with('success', 'تم تغيير الصورة الشخصية بنجاح');
    }
    public function update()
    {
        $teacher = Teacher::find(Auth::guard('teacher')->user()->id);
        $teacher->name = request('name');
        $teacher->email = request('email');
        $teacher->phone = request('phone');
        $teacher->description = request('description');
        $teacher->save();
        return redirect()->back()->with('success', 'تم تغيير البيانات بنجاح');
    }
}
