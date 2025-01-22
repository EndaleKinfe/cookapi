<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "is_creator",
        "is_admin"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts():HasMany{
        return $this->hasMany(Post::class)->chaperone();
    }

    public function videos(): HasMany
    {
        return $this->hasMany(Video::class)->chaperone();
    }
    public function messages():HasMany 
    {
        return $this->hasMany(Message::class)->chaperone();
    }

    public function received_messages():HasMany
    {
        return $this->hasMany(Message::class)->chaperone();
    }
    public function follows():HasMany 
    {
        return $this->hasMany(Follow::class);
    }

    public function followed():HasMany
    {
        return $this->hasMany(Follow::class, "followed_user_id");
    }

    public function frendresquests(): HasMany
    {
        return $this->hasMany(Follow::class);
    }

    public function receiver(): HasMany
    {
        return $this->hasMany(Follow::class, "receiver_user_id");
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class)->chaperone();
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function comments():HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function shares():HasMany
    {
        return $this->hasMany(Share::class);
    }
    public function interests(): BelongsToMany
    {
        return $this->belongsToMany(Interest::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, "imagable");
    }

    public function user_info(): HasOne
    {
        return $this->hasOne(UserInfo::class);
    }

}
