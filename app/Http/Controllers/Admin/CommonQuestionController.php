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
        return redirect()->route('get.admin.common-question')->with('success', 'تم اضافة السؤال بنجاح');
    }
    public function edit($id)
    {
        $question = CommonQuestion::find($id);
        return view('admin.common.edit', compact('question'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $question = CommonQuestion::find($id);
        $question->question = $request->question;
        $question->answer = $request->answer;
        $question->save();
        return redirect()->route('get.admin.common-question')->with('success', 'تم تعديل السؤال بنجاح');
    }
    public function destroy($id)
    {
        $question = CommonQuestion::find($id);
        $question->delete();
        return redirect()->route('get.admin.common-question')->with('success', 'تم حذف السؤال بنجاح');
    }
}
