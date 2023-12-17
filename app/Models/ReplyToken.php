<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyToken extends Model
{
    use HasFactory;

    protected $fillable = ['session_id', 'message_id', 'token', 'usage_left'];

    public function session()
    {
        return $this->belongsTo(ChatSession::class, 'session_id');
    }

    public function message()
    {
        return $this->belongsTo(ChatMessage::class, 'message_id');
    }
}
