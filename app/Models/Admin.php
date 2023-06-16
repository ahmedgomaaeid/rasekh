<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','p_admin', 'p_purchase', 'p_course','created_at','updated_at',
    ];
    
    public function getpAdminAttribute($value)
    {
        return $value == 1 ? 'مفعل' : 'غير مفعل';
    }
    public function getpPurchaseAttribute($value)
    {
        return $value == 1 ? 'مفعل' : 'غير مفعل';
    }
    public function getpCourseAttribute($value)
    {
        return $value == 1 ? 'مفعل' : 'غير مفعل';
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