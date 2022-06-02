<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin1@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin1234'),
        ]);
        User::factory(5)->create();
        Post::factory(12)->create();
        for ($i = 0; $i <=24; $i++) {
            Comment::factory()->create();
        }
    }
}
