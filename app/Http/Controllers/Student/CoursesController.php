<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Catogry\MainCategory;
use App\Models\Catogry\SubCategory;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index($id)
    {
        $mainCategory = MainCategory::find($id);
        $subCategories = SubCategory::where('main_category_id', $id)->where('status', 1)->get();
        return view('student.courses', compact('mainCategory', 'subCategories'));
    }
}
