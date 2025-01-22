<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ingredient extends Model
{
    /** @use HasFactory<\Database\Factories\IngredientFactory> */
    use HasFactory;

    public $fillable = [
        "post_id",
        "ingredient",
        "description",
        "amount"
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
