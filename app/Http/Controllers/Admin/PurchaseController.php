<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseRequest;
use App\Models\Course;
use App\Models\Purchase;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::all();
        return view('admin.purchase.index', compact('purchases'));
    }
    public function create()
    {
        $students = Student::where('status', 1)->get();
        $courses = Course::where('status', 1)->get();
        return view('admin.purchase.create', compact('students', 'courses'));
    }
    public function store(PurchaseRequest $request)
    {
        $purchase = new Purchase();
        $purchase->student_id = $request->student_id;
        $purchase->course_id = $request->course_id;
        $date = explode('/', $request->finnished_at);
        $purchase->finnished_at = $date[2].'-'.$date[0].'-'.$date[1];
        $purchase->course_price = $purchase->course->price;
        $teacher = Teacher::find($purchase->course->teacher_id);
        $teacher -> dues += $purchase->course_price * $purchase->course->teacher_percentage / 100;
        $teacher -> save();
        $purchase->save();
        return redirect()->route('get.admin.purchase')->with('success', 'تم اضافة الاشتراك بنجاح');
    }
    public function edit($id)
    {
        $purchase = Purchase::find($id);
        $date = explode('-', $purchase->finnished_at);
        $purchase->finnished_at = $date[1].'/'.$date[2].'/'.$date[0];
        $students = Student::where('status', 1)->get();
        $courses = Course::where('status', 1)->get();
        return view('admin.purchase.edit', compact('purchase', 'students', 'courses'));
    }
    public function update(Request $request, $id)
    {
        $purchase = Purchase::find($id);
        $teacher = Teacher::find($purchase->course->teacher_id);
        $teacher -> dues -= $purchase->course_price * $purchase->course->teacher_percentage / 100;
        $purchase->student_id = $request->student_id;
        $purchase->course_id = $request->course_id;
        $date = explode('/', $request->finnished_at);
        $purchase->finnished_at = $date[2].'-'.$date[0].'-'.$date[1];
        $purchase->course_price = $purchase->course->price;
        $teacher -> dues += $purchase->course_price * $purchase->course->teacher_percentage / 100;
        $teacher -> save();
        $purchase->save();
        return redirect()->route('get.admin.purchase')->with('success', 'تم تعديل الاشتراك بنجاح');
    }
    public function destroy($id)
    {
        $purchase = Purchase::find($id);
        $teacher = Teacher::find($purchase->course->teacher_id);
        $teacher -> dues -= $purchase->course_price * $purchase->course->teacher_percentage / 100;
        $teacher -> save();
        $purchase->delete();
        return redirect()->back()->with('success', 'تم حذف الاشتراك بنجاح');
    }
}
