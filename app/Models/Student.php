<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 
        'email', 
        'phone', 
        'photo', 
        'status', 
        'password',
        'points',
    ];
    public function getStatusAttribute($value)
    {
        return $value == 1 ? 'مفعل' : 'غير مفعل';
    }
    //course where not expired
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'purchases', 'student_id', 'course_id')->where('finnished_at', '>', now());
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
} 
