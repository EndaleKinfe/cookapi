<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserInfo extends Model
{
    /** @use HasFactory<\Database\Factories\UserInfoFactory> */
    use HasFactory;
    public $fillable = [
        "user_id",
        "first_name",
        "last_name",
        "phone_number",
        "birthday",
        "gender",
        "city",
        "country",
        "bio" 
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
