<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['teacher_id', 'student_id', 'lesson_id', 'teacher_read', 'student_read'];
    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }
    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }
    public function conversations()
    {
        return $this->hasMany('App\Models\Conversation');
    }
}
