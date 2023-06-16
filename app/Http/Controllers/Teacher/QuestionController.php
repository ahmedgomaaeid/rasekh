<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Notify;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index($id)
    {
        $questions = Question::where('lesson_id', $id)->get();
        return view('teacher.question.index', compact('questions', 'id'));
    }
    public function create($id)
    {
        return view('teacher.question.create', compact('id'));
    }
    public function store(Request $request, $id)
    {
        $question = new Question();
        $question->lesson_id = $id;
        $question->title = $request->title;
        $question->answer1 = $request->answer1;
        $question->answer2 = $request->answer2;
        $question->answer3 = $request->answer3;
        $question->answer4 = $request->answer4;
        $question->right_answer = $request->answer;
        $question->points = $request->points;
        $question->save();
        return redirect()->route('get.teacher.question', $id);
    }
    public function edit($id)
    {
        $question = Question::find($id);
        return view('teacher.question.edit', compact('question'));
    }
    public function update(Request $request, $id)
    {
        $question = Question::find($id);
        $question->title = $request->title;
        $question->answer1 = $request->answer1;
        $question->answer2 = $request->answer2;
        $question->answer3 = $request->answer3;
        $question->answer4 = $request->answer4;
        $question->right_answer = $request->answer;
        $question->points = $request->points;
        $question->save();
        return redirect()->route('get.teacher.question', $question->lesson_id);
    }
    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect()->route('get.teacher.question', $question->lesson_id);
    }
}
