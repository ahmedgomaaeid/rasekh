<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function contact()
    {
        return view('student.contact');
    }
    public function offers()
    {
        return view('student.offers');
    }
    public function about()
    {
        return view('student.about');
    }
    public function cards()
    {
        $shops = Shop::all();
        return view('student.cards', compact('shops'));
    }
}
