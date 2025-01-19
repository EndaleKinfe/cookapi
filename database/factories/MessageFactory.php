<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            "receiver_user_id" => User::factory(),
            "message" => fake()->text(),
            "message_seen" => fake()->boolean(70),
            "message_seen_at" =>fake()->dateTimeThisYear()
        ];
    }
}
