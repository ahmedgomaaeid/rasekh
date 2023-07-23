<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoomMeeting extends Model
{
    use HasFactory;
    protected $fillable = [
        'meeting_id',
        'teacher_id',
        'course_id',
        'lesson_name',
        'ref_num',
        'start_time',
        'start_url',
    ];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
