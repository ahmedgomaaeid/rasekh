<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table = 'conversation';
    protected $fillable = ['message_id', 'sender_id', 'sender_type', 'text'];  
    public function message()
    {
        return $this->belongsTo('App\Models\Message');
    }
}
