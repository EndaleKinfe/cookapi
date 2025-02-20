<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Share>
 */
class ShareFactory extends Factory
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
            "sharable_id" => fake()->randomElement([Post::factory(), Video::factory()]),
            "sharable_type" => function (array $attributes) {
                if(Post::find($attributes['sharable_id'])->type == "Post"){
                    return Post::find($attributes['sharable_id'])->type;
                }
                else{
                   return Video::find($attributes['sharable_id']);
                }
            }
        ];
    }
}
