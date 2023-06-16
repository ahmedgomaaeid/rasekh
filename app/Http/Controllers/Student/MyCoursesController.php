<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCoursesController extends Controller
{
    public function index()
    {
        $myCourses = Purchase::where('student_id', Auth::guard('student')->user()->id)->where('finnished_at', '>', now())->get();
        return view('student.mycourses', compact('myCourses'));
    }
}
