<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Mail\receipt;
use App\Models\ChargingCard;
use App\Models\Notify;
use App\Models\Payment;
use App\Models\Purchase;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Nafezly\Payments\Classes\PayPalPayment;

class PaymentController extends Controller
{
    public function pay()
    {
        $cart_data = json_decode(stripslashes(Cookie::get('shopping_cart')));
        $total_price = 0;
        $points = Student::find(auth()->user()->id)->points;
        foreach ($cart_data as $item_id) {
            $item = getCourseData($item_id->item_id);
            $total_price += $item->price;
        }
        if ($points < $total_price) {
            $payment = new PayPalPayment();
            $payment_data = $payment->pay(
                //price
                $total_price - $points,
            );

            $s_payment = new Payment();
            $s_payment->payment_id = $payment_data['payment_id'];
            $s_payment->data = Cookie::get('shopping_cart');
            $s_payment->save();
            $url = $payment_data['redirect_url'];
            return redirect($url);
        } else {
            $student = Student::find(auth()->user()->id);
            $student->points -= $total_price;
            $student->save();
            $cart_data = json_decode(stripslashes(Cookie::get('shopping_cart')));
            foreach ($cart_data as $item_id) {
                $item = getCourseData($item_id->item_id);
                $purchase = new Purchase();
                $purchase->student_id = auth()->user()->id;
                $purchase->course_id = $item->id;
                $purchase->course_price = $item->price;
                $purchase->finnished_at = date('Y-m-d', strtotime('+' . $item->finnish_after . ' days', strtotime(date('Y-m-d')))) . PHP_EOL;
                $purchase->save();
                $message = 'اشترى الطالب ' . $student->name . ' كورس ' . $item->name;
                $teacher = Teacher::find($item->teacher_id);
                $teacher->dues += $item->price * $item->teacher_percentage / 100;
                $teacher->save();
                $notify = new Notify();
                $notify->teacher_id = $item->teacher_id;
                $notify->text = $message;
                $notify->seen = 0;
                $notify->type = 0;
                $notify->save();
            }
            Cookie::queue('shopping_cart', json_encode(array()), 60);
            return redirect()->route('myCourses')->with('success', 'تمت عملية الشراء بنجاح');
        }
    }
    public function lahzaPay()
    {
        $cart_data = json_decode(stripslashes(Cookie::get('shopping_cart')));
        $total_price = 0;
        $points = Student::find(auth()->user()->id)->points;
        foreach ($cart_data as $item_id) {
            $item = getCourseData($item_id->item_id);
            $total_price += $item->price;
        }

        $url = "https://api.lahza.io/transaction/initialize";

        $fields = [
            'email' => Auth::guard('student')->user()->email,
            'amount' => ($total_price - $points)*100,
            'currency' => 'ILS',
            'callback_url' => route('verify-lahza-payment').'/',
        ];

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer sk_live_WCN3AEnZzohnUzE0Zk8lt5KAVKGESU7lw",
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $res = json_decode($result);
        /*
        {#1196 ▼ // app/Http/Controllers/Student/PaymentController.php:110
        +"status": true
        +"message": "Authorization URL created"
        +"data": {#395 ▼
            +"authorization_url": "https://checkout.lahza.io/Dt0Fl7oTQx"
            +"access_code": "Dt0Fl7oTQx"
            +"reference": "T2339753203083138"
        }
        }
        */
        $payment = new Payment();
        $payment->payment_id = $res->data->reference;
        $payment->data = Cookie::get('shopping_cart');
        $payment->save();
        $url = $res->data->authorization_url;
        return redirect($url);
    }
    public function payment_callback(Request $request)
    {
        //dd($request->all());
        $payment = new PayPalPayment();
        //verify function
        $response = $payment->verify($request);

        if ($response['success'] == true) {
            $payment = Payment::where('payment_id', $response['payment_id'])->first();
            $cart_data = json_decode(stripslashes($payment->data));
            foreach ($cart_data as $item_id) {
                $item = getCourseData($item_id->item_id);
                $student = auth()->guard('student')->user();
                $purchase = new Purchase();
                $purchase->student_id = $student->id;
                $purchase->course_id = $item->id;
                $purchase->course_price = $item->price;
                $purchase->finnished_at = date('Y-m-d', strtotime('+' . $item->finnish_after . ' days', strtotime(date('Y-m-d')))) . PHP_EOL;
                $purchase->save();
                $message = 'اشترى الطالب ' . $student->name . ' كورس ' . $item->name;
                $teacher = Teacher::find($item->teacher_id);
                $teacher->dues += $item->price * $item->teacher_percentage / 100;
                $teacher->save();
                $notify = new Notify();
                $notify->teacher_id = $item->teacher_id;
                $notify->text = $message;
                $notify->seen = 0;
                $notify->type = 0;
                $notify->save();
                //send email
                Mail::to($student->email)->send(new receipt($purchase));
            }
            Cookie::queue('shopping_cart', json_encode(array()), 60);
            Student::find(auth()->user()->id)->update(['points' => 0]);
            return redirect()->route('myCourses')->with('success', 'تم الدفع بنجاح');
        }
        return redirect()->route('cart')->with('status', 'حدث خطأ أثناء الدفع');
    }
    public function lahzaPaymentCallback($ref)
    {
        //delete &reference= from start of $ref
        $ref = substr($ref, 11);
        $url = "https://api.lahza.io/transaction/verify/" . $ref;

        //get the response from the server
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer sk_live_WCN3AEnZzohnUzE0Zk8lt5KAVKGESU7lw",
            "Cache-Control: no-cache",
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $res = json_decode($result);
        if($res->status == true){
            $payment = Payment::where('payment_id', $res->data->reference)->first();
            if(!$payment){
                return redirect()->route('myCourses')->with('status', 'حدث خطأ أثناء الدفع');
            }
            $cart_data = json_decode(stripslashes($payment->data));
            foreach ($cart_data as $item_id) {
                $item = getCourseData($item_id->item_id);
                $student = Student::where('email', $res->data->customer->email)->first();
                $purchase = new Purchase();
                $purchase->student_id = $student->id;
                $purchase->course_id = $item->id;
                $purchase->course_price = $item->price;
                $purchase->finnished_at = date('Y-m-d', strtotime('+' . $item->finnish_after . ' days', strtotime(date('Y-m-d')))) . PHP_EOL;
                $purchase->save();
                $message = 'اشترى الطالب ' . $student->name . ' كورس ' . $item->name;
                $teacher = Teacher::find($item->teacher_id);
                $teacher->dues += $item->price * $item->teacher_percentage / 100;
                $teacher->save();
                $notify = new Notify();
                $notify->teacher_id = $item->teacher_id;
                $notify->text = $message;
                $notify->seen = 0;
                $notify->type = 0;
                $notify->save();
                //send email
                Mail::to($student->email)->send(new receipt($purchase));
            }
            $payment->delete();
            Cookie::queue('shopping_cart', json_encode(array()), 60);
            Student::find(auth()->user()->id)->update(['points' => 0]);
            return redirect()->route('myCourses')->with('success', 'تم الدفع بنجاح');
        }else{
            return redirect()->route('cart')->with('status', 'حدث خطأ أثناء الدفع');
        }

    }




    public function charging()
    {
        return view('student.charge');
    }
    public function charge(Request $request)
    {
        $this->validate($request, [
            'card_number' => 'required|numeric|min:9'
        ]);
        //check if card is exist and not used
        $card = ChargingCard::where('card_number', $request->card_number)->where('student_id', null)->first();
        if ($card) {
            $card->student_id = Auth::guard('student')->user()->id;
            $card->save();
            $student = Student::find(Auth::guard('student')->user()->id);
            $student->points += $card->points;
            $student->save();
            return redirect()->back()->with('success', 'تم شحن البطاقة بنجاح');
        } else {
            return redirect()->back()->with('status', 'رقم البطاقة غير صحيح');
        }
    }
}
