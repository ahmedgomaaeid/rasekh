<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Catogry\SubCategory;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeachersController extends Controller
{
    public function index($id)
    {
        $course = SubCategory::find($id);
        
        //get courses where not in pruchases table or finnished_at < now()
        if(Auth::guard('student')->check())
        {
            $courses = Course::where('category_id', $id)
                ->whereNotIn('id', function ($query) {
                    $query->select('course_id')
                        ->from('purchases')
                        ->where('student_id', Auth::guard('student')->user()->id)
                        ->where('finnished_at', '>', now());
                })
                ->get();
        }else
        {
            $courses = Course::where('category_id', $id)->get();
        }

        
        return view('student.teachers', compact('course', 'courses'));
    }
}
