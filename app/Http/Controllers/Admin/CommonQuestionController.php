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
}
