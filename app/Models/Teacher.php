<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Teacher extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 
        'email', 
        'phone', 
        'description', 
        'course_access',
        'live_access',
        'photo', 
        'approved',
        'status', 
        'password',
        'dues',
        'recieved',
        'created_by', 
        'updated_by', 
    ];
    public function getStatusAttribute($value)
    {
        return $value == 1 ? 'مفعل' : 'غير مفعل';
    }
    public function getCourseAccessAttribute($value)
    {
        return $value == 1 ? 'مفعل' : 'غير مفعل';
    }
    public function getLiveAccessAttribute($value)
    {
        return $value == 1 ? 'مفعل' : 'غير مفعل';
    }
    public function teacher_categories()
    {
        return $this->hasMany('App\Models\Catogry\TeacherCategory', 'teacher_id');
    }
    public function zoom_integration()
    {
        return $this->hasOne('App\Models\ZoomIntegration', 'teacher_id');
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
