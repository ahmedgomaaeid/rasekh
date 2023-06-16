<?php

namespace App\Models\Catogry;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'name', 
        'main_category_id', 
        'photo'
    ];
    public function getStatusAttribute($value)
    {
        return $value == 1 ? 'مفعل' : 'غير مفعل';
    }
    public function mainCategory()
    {
        return $this->belongsTo(MainCategory::class);
    }
}
