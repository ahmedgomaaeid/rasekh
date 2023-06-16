<?php

namespace App\Models\Catogry;

use Illuminate\Database\Eloquent\Model;

class TeacherCategory extends Model
{
    protected $fillable = ['id','teacher_id','category_id'];
    public function category()
    {
        return $this->belongsTo('App\Models\Catogry\SubCategory', 'category_id');
    }
}


