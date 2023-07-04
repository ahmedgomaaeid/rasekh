<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoomIntegration extends Model
{
    use HasFactory;
    protected $fillable = ['teacher_id', 'oauth_client_id', 'sdk_client_id', 'sdk_client_secret' ,'oauth_client_secret'];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
