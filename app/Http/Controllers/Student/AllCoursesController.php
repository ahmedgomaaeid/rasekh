<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Catogry\SubCategory;
use Illuminate\Http\Request;

class AllCoursesController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::Where('status', 1)->get();
        return view('student.subcategories', compact('subCategories'));
    }
}
