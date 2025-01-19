<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "image_url" => fake()->imageUrl(),
            "imagable_id" => fake()->randomElement([Post::factory(), User::factory()]),
            "imagable_type" => function (array $attributes) {
                if (Post::find($attributes['sharable_id'])->type == "Post") {
                    return Post::find($attributes['sharable_id'])->type;
               
                } else {
                    User::find($attributes['sharable_id'])->type;
                }
            }
        ];
    }
}
