<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Catogry\MainCategory;
use App\Models\CommonQuestion;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        
        $mainCategories = MainCategory::where('status', 1)->get();
        $questions = CommonQuestion::all();
        return view('student.index', compact('mainCategories', 'questions'));
    }
}
