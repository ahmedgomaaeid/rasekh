<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Message;
use App\Models\Notify;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $teacher = Teacher::find(Auth::guard('teacher')->user()->id);
        $dues = $teacher->dues;
        $received = $teacher->received;
        $teacher_courses = Course::where('teacher_id', Auth::guard('teacher')->user()->id)->count();
        $messages = Message::where('teacher_id', Auth::guard('teacher')->user()->id)->orderBy('updated_at', 'desc')->get();
        return view('teacher.index', compact('dues', 'received', 'teacher_courses', 'messages'));
    }
}
