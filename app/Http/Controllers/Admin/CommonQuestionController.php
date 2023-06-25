<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommonQuestion;
use Illuminate\Http\Request;

class CommonQuestionController extends Controller
{
    public function index()
    {
        $questions = CommonQuestion::all();
        return view('admin.common.index', compact('questions'));
    }
    public function create()
    {
        return view('admin.common.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $question = new CommonQuestion();
        $question->question = $request->question;
        $question->answer = $request->answer;
        $question->save();
        return redirect()->route('admin.common.index')->with('success', 'تم اضافة السؤال بنجاح');
    }
}
