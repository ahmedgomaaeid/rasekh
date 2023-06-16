<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargingCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'card_number',
        'points',
        'student_id',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
