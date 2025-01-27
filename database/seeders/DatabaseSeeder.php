<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Follow;
use App\Models\FrendRequest;
use App\Models\Image;
use App\Models\Ingredient;
use App\Models\Instruction;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Video;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Validation\Rules\Email;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->count(5)->has(
            Post::factory()->count(2)->has(
                Comment::factory()->count(2)->has(
                    Like::factory()->count(2)
                )
            )->has(
                Ingredient::factory()->count(3)
            )
            ->has(
                Instruction::factory()->count(5)
            )->has(
                Image::factory()->count(2)
            )->has(
                Like::factory()->count(2)
            )
        )->has(
            UserInfo::factory()
        )->has(Image::factory())->has(
            Video::factory()->count(2)->has(
                Comment::factory()->count(2)->has(
                    Like::factory()->count(2)
                )
            )->has(
                Like::factory()->count(2)
            )
        )->has(Follow::factory()->count(2))->create();

        
       
    }
}
