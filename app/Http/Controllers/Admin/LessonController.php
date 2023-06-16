<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();
        return view('admin.lesson.index', compact('lessons'));
    }
    public function create()
    {
        $courses = Course::all();
        return view('admin.lesson.create', compact('courses'));
    }
    public function store(LessonRequest $request)
    {
        $file_extension = $request->file('video')->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $request->file('video')->move('assets/videos', $file_name);
        $lesson = new Lesson();
        $lesson->name = $request->name;
        $lesson->course_id = $request->course_id;
        $lesson->publisher_type = 0;
        $lesson->video = $file_name;
        $lesson->type = 0;
        $lesson->status = 1;
        $lesson->save();
        return redirect()->route('get.admin.lesson')->with('success', 'تم اضافة الدرس بنجاح');
    }
    public function edit($id)
    {
        $lesson = Lesson::find($id);
        $courses = Course::all();
        return view('admin.lesson.edit', compact('lesson', 'courses'));
    }
    public function update(Request $request, $id)
    {
        $lesson = Lesson::find($id);
        if ($request->hasFile('video')) {
            unlink('assets/videos/' . $lesson->video);
            $file_extension = $request->file('video')->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $request->file('video')->move('assets/videos', $file_name);
            $lesson->video = $file_name;
        }
        $lesson->name = $request->name;
        $lesson->course_id = $request->course_id;
        $lesson->publisher_type = 0;
        $lesson->type = 0;
        if(!$request->has('status')){
            $lesson->status = 0;
        }else{
            $lesson->status = 1;
        }
        $lesson->save();
        return redirect()->route('get.admin.lesson')->with('success', 'تم تعديل الدرس بنجاح');
    }
}
