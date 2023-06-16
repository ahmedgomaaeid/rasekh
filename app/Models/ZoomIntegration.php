<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoomIntegration extends Model
{
    use HasFactory;
    protected $fillable = ['teacher_id', 'client_id', 'client_secret', 'jwt', 'zoom_email'];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
