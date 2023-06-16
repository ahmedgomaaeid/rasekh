<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Models\Catogry\MainCategory;
use App\Models\Catogry\SubCategory;
use App\Models\Catogry\TeacherCategory;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function approve($id)
    {
        $teacher = Teacher::find($id);
        $teacher->approved = 1;
        $teacher->save();
        return redirect()->route('get.admin.teacher.edit',$id)->with('success', 'تم قبول المعلم بنجاح يرجى تحديد الصلاحيات والاقسام');
    }
    public function send_money($id)
    {
        $teacher = Teacher::find($id);
        $teacher->received = $teacher->received + $teacher->dues;
        $teacher->dues = 0;
        $teacher->save();
        return redirect()->back()->with('success', 'تم ارسال المبلغ للمعلم بنجاح');
    }
    public function index()
    {
        $teachers = teacher::where('approved', 1)->get();
        return view('admin.teacher.index', compact('teachers'));
    }
    public function create()
    {
        $sub_categories = SubCategory::all();
        return view('admin.teacher.create', compact('sub_categories'));
    }
    public function store(TeacherRequest $request)
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
        $teacher->phone = $request->phone;
        $teacher->description = $request->description;


        if(!$request->has('course_access')){
            $teacher->course_access = 0;
        }else{
            $teacher->course_access = 1;
        }

        if(!$request->has('live_access')){
            $teacher->live_access = 0;
        }else{
            $teacher->live_access = 1;
        }

        $teacher->photo = $file_name;
        $teacher->password = bcrypt($request->password);
        $teacher->approved = 1;
        $teacher->status = 1;
        $teacher->save();
        foreach ($request->sections as $sub_category) {
            $teacher_category = new TeacherCategory();
            $teacher_category->teacher_id = $teacher->id;
            $teacher_category->category_id = $sub_category;
            $teacher_category->save();
        }
        return redirect()->route('get.admin.teacher')->with('success', 'تم اضافة المعلم بنجاح');
    }
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        $teacher_sections =  TeacherCategory::where('teacher_id', $id)->get();
        $sub_categories = SubCategory::all();
        return view('admin.teacher.edit', compact('teacher', 'sub_categories' , 'teacher_sections'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:teachers,email,' . $id,
            'phone' => 'required|unique:teachers,phone,' . $id,
            'description' => 'required',
            'sections' => 'required',
        ]);
        
        $teacher = Teacher::find($id);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->description = $request->description;
        if(!$request->has('course_access')){
            $teacher->course_access = 0;
        }else{
            $teacher->course_access = 1;
        }
        if(!$request->has('live_access')){
            $teacher->live_access = 0;
        }else{
            $teacher->live_access = 1;
        }
        if(!$request->has('status')){
            $teacher->status = 0;
        }else{
            $teacher->status = 1;
        }
        if($request->hasFile('photo')){
            if($teacher->photo != null){
                unlink('assets/images/teachers/'.$teacher->photo);
            }
            $file_extension = $request->file('photo')->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $request->file('photo')->move('assets/images/teachers', $file_name);
            $teacher->photo = $file_name;
        }
        $teacher->approved = 1;
        if(!empty($request->password)){
            $teacher->password = bcrypt($request->password);
        }
        $teacher->save();
        TeacherCategory::where('teacher_id', $id)->delete();
        foreach ($request->sections as $sub_category) {
            $teacher_category = new TeacherCategory();
            $teacher_category->teacher_id = $teacher->id;
            $teacher_category->category_id = $sub_category;
            $teacher_category->save();
        }
        return redirect()->route('get.admin.teacher')->with('success', 'تم تعديل المعلم بنجاح');
    }
}
