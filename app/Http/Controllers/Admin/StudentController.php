<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.student.index', compact('students'));
    }
    public function create(){
        return view('admin.student.create');
    }
    public function store(StudentRequest $request){ 
        if($request->hasFile('photo')){
            $file_extension = $request->file('photo')->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $request->file('photo')->move('assets/images/students', $file_name);
        }else
        {
            $file_name = '';
        }

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->photo = $file_name;
        $student->status = 1;
        $student->password = bcrypt($request->password);
        $student->save();
        return redirect()->route('get.admin.student')->with('success', 'تم اضافة الطالب بنجاح');
    }
    public function edit($id){
        $student = Student::find($id);
        return view('admin.student.edit', compact('student'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $id,
            'phone' => 'required|unique:students,phone,' . $id,
        ]);
        
        $student = Student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        if($request->hasFile('photo')){
            if($student->photo != ''){
                unlink('assets/images/students/' . $student->photo);
            }
            $file_extension = $request->file('photo')->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $request->file('photo')->move('assets/images/students', $file_name);
            $student->photo = $file_name;
        }
        if(!$request->has('status')){
            $student->status = 0;
        }else{
            $student->status = 1;
        }
        if(!empty($request->password)){
            $student->password = bcrypt($request->password);
        }
        $student->save();
        return redirect()->route('get.admin.student')->with('success', 'تم تعديل الطالب بنجاح');
    }
}
