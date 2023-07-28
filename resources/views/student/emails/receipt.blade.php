<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt Sample</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Source Sans Pro', sans-serif;
}

.container {
    display: block;
    width: 100%;
    background: #fff;
    max-width: 350px;
    padding: 25px;
    margin: 50px auto 0;
    box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
}

.receipt_header {
    padding-bottom: 40px;
    border-bottom: 1px dashed #000;
    text-align: center;
}

.receipt_header h1 {
    font-size: 20px;
    margin-bottom: 5px;
    text-transform: uppercase;
}

.receipt_header h1 span {
    display: block;
    font-size: 25px;
}

.receipt_header h2 {
    font-size: 14px;
    color: #727070;
    font-weight: 300;
}

.receipt_header h2 span {
    display: block;
}

.receipt_body {
    margin-top: 25px;
}

table {
    width: 100%;
}

thead, tfoot {
    position: relative;
}

thead th:not(:last-child) {
    text-align: left;
}

thead th:last-child {
    text-align: right;
}

thead::after {
    content: '';
    width: 100%;
    border-bottom: 1px dashed #000;
    display: block;
    position: absolute;
}

tbody td:not(:last-child), tfoot td:not(:last-child) {
    text-align: left;
}

tbody td:last-child, tfoot td:last-child{
    text-align: right;
}

tbody tr:first-child td {
    padding-top: 15px;
}

tbody tr:last-child td {
    padding-bottom: 15px;
}

tfoot tr:first-child td {
    padding-top: 15px;
}

tfoot::before {
    content: '';
    width: 100%;
    border-top: 1px dashed #000;
    display: block;
    position: absolute;
}

tfoot tr:first-child td:first-child, tfoot tr:first-child td:last-child {
    font-weight: bold;
    font-size: 20px;
}

.date_time_con {
    display: flex;
    justify-content: center;
    column-gap: 25px;
}

.items {
    margin-top: 25px;
}

h3 {
    border-top: 1px dashed #000;
    padding-top: 10px;
    margin-top: 25px;
    text-align: center;
    text-transform: uppercase;
}
    </style>
<div class="container">
    
    <div class="receipt_header">
    <h1>ايصال شراء <span>منصة راسخ التعليمية</span></h1>
    <a href="{{route('index')}}">{{route('index')}}</a>
    </div>
    
    <div class="receipt_body">

        <div class="date_time_con">
            <div class="date">{{ $order->created_at->format('d/m/Y') }}</div>
            <div class="time">{{ $order->created_at->format('h:i A') }}</div>
        </div>

        <div class="items">
            <table>
        
                <thead>
                    <th>رقم الطلب</th>
                    <th>العنصر</th>
                    <th>السعر</th>
                </thead>
        
                <tbody>
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->course->name}} للاستاذ {{$order->course->steacher->name}}</td>
                        <td>{{$order->course_price}} شيكل</td>
                    </tr>
                </tbody>

                <tfoot>
                    <tr>
                        <td>اسم الطالب</td>
                        <td></td>
                        <td>{{Auth::guard('student')->user()->name}}</td>
                    </tr>
                    <tr>
                        <td>البريد الالكترونى</td>
                        <td></td>
                        <td>{{Auth::guard('student')->user()->email}}</td>
                    </tr>
                    <tr>
                        <td>رقم الهاتف</td>
                        <td></td>
                        <td>{{Auth::guard('student')->user()->phone}}</td>
                    </tr>
                </tfoot>

            </table>
        </div>

    </div>


    <h3>شكرا لك</h3>

</div>

</body>
</html>