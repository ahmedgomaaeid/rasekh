<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function create()
    {
        $courses = Course::all();
        return view('admin.quiz.create', compact('courses'));
    }
    public function store(Request $request)
    {
        $quiz = new Lesson();
        $quiz->name = $request->name;
        $quiz->course_id = $request->course_id;
        $quiz->type = 1;
        $quiz->status = 1;
        $quiz->save();
        return redirect()->route('get.admin.lesson')->with('success', 'تم اضافة الاختبار بنجاح');
    }
    public function edit($id)
    {
        $quiz = Lesson::find($id);
        $courses = Course::all();
        return view('admin.quiz.edit', compact('quiz', 'courses'));
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
        return redirect()->route('get.admin.lesson')->with('success', 'تم تعديل الاختبار بنجاح');
    }
}
