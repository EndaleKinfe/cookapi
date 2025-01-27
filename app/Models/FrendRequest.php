<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FrendRequest extends Model
{
    /** @use HasFactory<\Database\Factories\FrendRequestFactory> */
    use HasFactory;

    public $fillable = [
        "user_id",
        "receiver_user_id",
        "accept"
    ];
    protected $with = ['user', 'receiver_user'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function receiver_user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
