<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Notify;
use App\Models\Purchase;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $teachers = Teacher::where('approved', 0)->get();
        $unapp_teachers = Teacher::where('approved', 0)->count();
        $app_teachers = Teacher::where('approved', 1)->count();
        $teacher_dues = Teacher::where('approved', 1)->orderBy('dues', 'desc')->orderBy('received', 'desc')->get();
        $students = Student::all()->count();
        $price = Purchase::all()->sum('course_price');
        $dues = Teacher::all()->sum('dues');
        $received = Teacher::all()->sum('received');
        return view('admin.index', compactt('teachers', 'unapp_teachers', 'app_teachers','teacher_dues', 'students', 'price', 'dues', 'received'));
    }
    public function error()
    {
        $errors = Notify::where('teacher_id', 0)->get();
        return view('admin.error', compact('errors'));
    }
    public function clear_error()
    {
        $errors = Notify::where('teacher_id', 0)->get();
        foreach ($errors as $error) {
            $error->delete();
        }
        return redirect()->back()->with('success', 'تم مسح الاخطاء بنجاح');
    }
}
