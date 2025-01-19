<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
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

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class)->chaperone();
    }

    public function instructions():HasMany
    {
        return $this->hasMany(Instruction::class)->chaperone();
    }
    public function ingredients():HasMany
    {
        return $this->hasMany(Ingredient::class)->chaperone();
    }
    public function images():MorphMany
    {
        return $this->morphMany(Image::class, "imagable")->chaperone();
    }
}
