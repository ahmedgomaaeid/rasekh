<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Lesson extends Model
{
    protected $fillable = ['name', 'course_id', 'video','status','type','publisher_type'];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function getStatusAttribute($value)
    {
        return $value == 1 ? 'مفعل' : 'غير مفعل';
    }
    public function getTypeAttribute($value)
    {
        return $value == 1 ? 'اختبار' : 'درس';
    }
    public function is_seen()
    {
        return $this->hasMany(SeenVideo::class)->where('student_id', Auth::guard('student')->user()->id);
    }
}
