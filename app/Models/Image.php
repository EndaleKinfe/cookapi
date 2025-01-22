<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    /** @use HasFactory<\Database\Factories\ImageFactory> */
    use HasFactory;

    public $fillable = [
        "image_url",
        "imagable_id",
        "imagable_type"
    ];

    public function imagable():MorphTo
    {
        return $this->morphTo();
    }
}
