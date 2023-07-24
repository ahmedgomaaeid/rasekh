<?php

use App\Models\ChargingCard;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

function getCourseData($id)
{
    $course = Course::find($id);
    if (!$course) {
        abort(404);
    }
    return $course;
}
function generateRandomString($length = 60) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
function generateRandomNumber($length = 9) {
    $num = substr(str_shuffle(str_repeat($x='0123456789', ceil($length/strlen($x)) )),1,$length);
    //check num is unique and length = 9 and not start with 0
    if (ChargingCard::where('card_number', $num)->first() || strlen($num) != 9 || $num[0] == 0) {
        return generateRandomNumber();
    }else{
        return $num;
    }
}
function convertEnglishnumtoar($num)
{
    $ar_num = str_replace('0', '٠', $num);
    $ar_num = str_replace('1', '١', $ar_num);
    $ar_num = str_replace('2', '٢', $ar_num);
    $ar_num = str_replace('3', '٣', $ar_num);
    $ar_num = str_replace('4', '٤', $ar_num);
    $ar_num = str_replace('5', '٥', $ar_num);
    $ar_num = str_replace('6', '٦', $ar_num);
    $ar_num = str_replace('7', '٧', $ar_num);
    $ar_num = str_replace('8', '٨', $ar_num);
    $ar_num = str_replace('9', '٩', $ar_num);
    return $ar_num;
}
function dbz($denominator)
{
    if ($denominator == 0) {
        return 1;
    }
    return $denominator;
}
function checkIfStudentHasCourse($course)
{
    $student = Auth::guard('student')->user();
    if (!$student->courses->contains($course)) {
        abort(404);
    }
}