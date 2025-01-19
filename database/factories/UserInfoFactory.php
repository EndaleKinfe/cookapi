<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserInfo>
 */
class UserInfoFactory extends Factory
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
            "first_name" => fake()->name(),
            "last_name" => fake()->name(),
            "phone_number" => fake()->phoneNumber(),
            "birthday" => fake()->dateTimeThisCentury(),
            "gender" => fake()->randomElement(["male", "female"]),
            "city" => fake()->city(),
            "country" => fake()->country(),
            "bio" => fake()->text()
        ];
    }
}
