<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Catogry\SubCategory;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.course.index', compact('courses'));
    }
    public function create()
    {
        $categories = SubCategory::all();
        $teachers = Teacher::all();
        return view('admin.course.create', compact('categories','teachers'));
    }
    public function store(CourseRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
            'category_id' => 'required',
        ]);
        $file_extension = $request->file('image')->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $request->file('image')->move('assets/images/courses', $file_name);

        $course = new Course();
        $course->name = $request->name;
        $course->image = $file_name;
        $course->price = $request->price;
        $course->teacher_percentage = $request->teacher_percentage;
        $course->finnish_after = $request->finnish_after;
        $course->teacher_id = $request->teacher_id;
        $course->category_id = $request->category_id;
        $course->publisher_type = 1;
        $course->publisher_id = Auth::guard('admin')->user()->id;
        $course->status = 1;
        $course->save();
        return redirect()->route('get.admin.course')->with('success', 'تم اضافة الكورس بنجاح');
    }
    public function edit($id)
    {
        $course = Course::find($id);
        $categories = SubCategory::all();
        $teachers = Teacher::all();
        return view('admin.course.edit', compact('course', 'categories', 'teachers'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);
        $course = Course::find($id);
        if ($request->hasFile('image')) {
            unlink('assets/images/courses/' . $course->image);
            $file_extension = $request->file('image')->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $request->file('image')->move('assets/images/courses', $file_name);
            $course->image = $file_name;
        }
        $course->name = $request->name;
        $course->price = $request->price;
        $course->teacher_percentage = $request->teacher_percentage;
        $course->finnish_after = $request->finnish_after;
        $course->teacher_id = $request->teacher_id;
        $course->category_id = $request->category_id;
        if(!$request->has('status')){
            $course->status = 0;
        }else{
            $course->status = 1;
        }
        $course->save();
        return redirect()->route('get.admin.course')->with('success', 'تم تعديل الكورس بنجاح');
    }
}
