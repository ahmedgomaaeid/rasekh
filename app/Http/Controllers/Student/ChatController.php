<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $messages = Message::where('student_id', Auth::guard('student')->user()->id)->orderBy('updated_at', 'desc')->get();
        return view('student.chat.index', compact('messages'));
    }
    public function chat($id)
    {
        $message = Message::find($id);
        return view('student.chat.chat', compact('message'));
    }
}
