<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();
        return view('teacher.lesson.index', compact('lessons'));
    }
    public function create()
    {
        $courses = Course::where('teacher_id', auth()->guard('teacher')->user()->id)->get();
        return view('teacher.lesson.create', compact('courses'));
    }
    public function store(LessonRequest $request)
    {
        $file_extension = $request->file('video')->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $request->file('video')->move('assets/videos', $file_name);
        $lesson = new Lesson();
        $lesson->name = $request->name;
        $lesson->course_id = $request->course_id;
        $lesson->publisher_type = 1;
        $lesson->video = $file_name;
        $lesson->type = 0;
        $lesson->status = 1;
        $lesson->save();
        return redirect()->route('get.teacher.lesson')->with('success', 'تم اضافة الدرس بنجاح');
    }
    public function edit($id)
    {
        $lesson = Lesson::find($id);
        $courses = Course::where('teacher_id', auth()->guard('teacher')->user()->id)->get();

        return view('teacher.lesson.edit', compact('lesson', 'courses'));
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
        $lesson->publisher_type = 1;
        $lesson->type = 0;
        if(!$request->has('status')){
            $lesson->status = 0;
        }else{
            $lesson->status = 1;
        }
        $lesson->save();
        return redirect()->route('get.teacher.lesson')->with('success', 'تم تعديل الدرس بنجاح');
    }
}
