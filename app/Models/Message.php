<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Message extends Model
{
    /** @use HasFactory<\Database\Factories\MessageFactory> */
    use HasFactory;

    public $fillable = [
        "user_id",
        "receiver_user_id",
        "message",
        "message_seen",
        "message_seen_at"
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function receiver():BelongsTo
    {
        return $this->belongsTo(User::class, "receiver_user_id");
    }
    
}
