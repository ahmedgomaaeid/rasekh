<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Nafezly\Payments\Classes\PayPalPayment;

class CartController extends Controller
{
    public function index()
    {
        $points = Student::find(auth()->user()->id)->points;
        return view('student.cart', compact('points'));
    }
    public function addToCart($id)
    {   
        $course = Course::find($id);
        if (!$course) {
            abort(404);
        }
        if(isset($_COOKIE['shopping_cart'])) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);

        } else {
            $cart_data = array();
        }
        $item_id_list = array_column($cart_data, 'item_id');
        if(in_array($id,$item_id_list))
        {
            return redirect()->back()->with('error', 'الدورة موجودة بالفعل في السلة');
        }else
        {
            $item_array = array(
                'item_id' => $course->id,
            );
            $cart_data[] = $item_array;
            $item_data = json_encode($cart_data);
            Cookie::queue('shopping_cart', $item_data, 60);
            return redirect()->back()->with('success', 'تمت الاضافة الي السلة بنجاح');
        }
    }
    public function removeItem($id)
    {
        try {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]['item_id'] == $id)
                {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    Cookie::queue('shopping_cart', $item_data, 60);
                    return redirect()->back()->with('success', 'تمت الازالة من السلة بنجاح');
                }
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'حدث خطأ ما');
        }
    }
    public function clearCart()
    {
        Cookie::queue('shopping_cart', json_encode(array()), 60);
        return redirect()->back()->with('success', 'تمت الازالة من السلة بنجاح');
    }
}
