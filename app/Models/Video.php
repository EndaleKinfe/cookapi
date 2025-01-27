<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Video extends Model
{
    /** @use HasFactory<\Database\Factories\VideoFactory> */
    use HasFactory;

    public $fillable = [
        "video_url",
        "description",
        "user_id"
    ];

    protected $with = ["user"];

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, "commentable");
    }

    public function likes(): MorphOne
    {
        return $this->morphOne(Like::class, "likable");
    }

    public function shares(): MorphMany
    {
        return $this->morphMany(Share::class, "sharable");
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
