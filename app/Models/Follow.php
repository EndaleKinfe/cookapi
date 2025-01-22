<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Follow extends Model
{
    /** @use HasFactory<\Database\Factories\FollowFactory> */
    use HasFactory;
    public $fillable = [
        "user_id",
        "receiver_user_id"
    ];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function followed_user(): BelongsTo
    {
         return $this->belongsTo(User::class);
    }
}
