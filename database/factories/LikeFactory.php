<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => User::factory(),
            "likable_id" => fake()->randomElement([Post::factory(), Video::factory(), Comment::factory()]),
            "likable_type" => function (array $attributes) {
                if (Post::find($attributes['sharable_id'])->type == "Post") {
                    return Post::find($attributes['sharable_id'])->type;
                } else if(Video::find($attributes['sharable_id'])->type == "Video") {
                    return Video::find($attributes['sharable_id'])->type;
                }
                else{
                    return Comment::find($attributes['sharable_id'])->type;
                }
            }
        ];
    }
}
