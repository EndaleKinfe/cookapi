<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Instruction extends Model
{
    /** @use HasFactory<\Database\Factories\InstructionFactory> */
    use HasFactory;
    public $fillable = [
        "post_id",
        "instruction"
    ];
    public function post():BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
