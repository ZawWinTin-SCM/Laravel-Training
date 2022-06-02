<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => Post::inRandomOrder()->first(),
            'user_id' => User::inRandomOrder()->first(),
            'parent_id' => random_int(0,2) == 1 ? null : Comment::whereNull('parent_id')->inRandomOrder()->first(),
            'comment' => $this->faker->paragraph(5),
        ];
    }
}
