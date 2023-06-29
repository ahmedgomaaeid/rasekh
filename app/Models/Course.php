<?php

namespace App\Models;

use App\Models\Catogry\SubCategory;
use App\Models\Teacher;
use App\Models\Admin;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = ['name', 'image', 'price', 'teacher_percentage', 'finnish_after', 'teacher_id', 'category_id', 'publisher_type','publisher_id','status'];
    public function category()
    {
        return $this->belongsTo(SubCategory::class,'category_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'publisher_id');
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class,'publisher_id');
    }
    public function getStatusAttribute($value)
    {
        return $value == 1 ? 'مفعل' : 'غير مفعل';
    }
    public function getPublisherTypeAttribute($value)
    {
        return $value == 1 ? 'ادمن' : 'معلم';
    }
    public function steacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
    public function purchases()
    {
        return $this->hasMany(Purchase::class,'course_id');
    }
    public function seen_video_number()
    {
        return $this->hasMany('App\Models\SeenVideo', 'course_id', 'id')->where('student_id', Auth::guard('student')->user()->id);
    }
    public function lesson_number()
    {
        return $this->hasMany('App\Models\Lesson', 'course_id', 'id');
    }
    public function zoomMeetings()
    {
        return $this->hasMany('App\Models\ZoomMeeting', 'course_id', 'id');
    }
    public function lastZoomMeeting()
    {
        return $this->hasOne('App\Models\ZoomMeeting', 'course_id', 'id')->where('start_time', '>', now()->subMinutes(60))->orderBy('start_time', 'asc');
    }
}
