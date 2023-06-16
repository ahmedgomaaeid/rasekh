<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeenVideo extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'course_id', 'lesson_id', 'quiz_result'];
}
