<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function create()
    {
        $courses = Course::where('teacher_id', auth()->guard('teacher')->user()->id)->get();
        return view('teacher.quiz.create', compact('courses'));
    }
    public function store(Request $request)
    {
        $quiz = new Lesson();
        $quiz->name = $request->name;
        $quiz->course_id = $request->course_id;
        $quiz->type = 1;
        $quiz->status = 1;
        $quiz->publisher_type = 1;
        $quiz->save();
        return redirect()->route('get.teacher.lesson')->with('success', 'تم اضافة الاختبار بنجاح');
    }
    public function edit($id)
    {
        $quiz = Lesson::find($id);
        $courses = Course::where('teacher_id', auth()->guard('teacher')->user()->id)->get();
        return view('teacher.quiz.edit', compact('quiz', 'courses'));
    }
    public function update(Request $request, $id)
    {
        $quiz = Lesson::find($id);
        $quiz->name = $request->name;
        $quiz->course_id = $request->course_id;
        $quiz->type = 1;
        if(!$request->has('status')){
            $quiz->status = 0;
        }else{
            $quiz->status = 1;
        }
        $quiz->save();
        return redirect()->route('get.teacher.lesson')->with('success', 'تم تعديل الاختبار بنجاح');
    }
}
