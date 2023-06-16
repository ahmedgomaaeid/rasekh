<?php

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
    return substr(str_shuffle(str_repeat($x='0123456789', ceil($length/strlen($x)) )),1,$length);
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