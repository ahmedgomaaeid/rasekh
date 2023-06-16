<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Purchase extends Model
{
    protected $fillable = ['student_id', 'course_id', 'course_price', 'finnished_at'];
    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
    public function seen_video_number()
    {
        return $this->hasMany('App\Models\SeenVideo', 'course_id', 'course_id')->where('student_id', Auth::guard('student')->user()->id);
    }
    public function lesson_number()
    {
        return $this->hasMany('App\Models\Lesson', 'course_id', 'course_id');
    }
}
