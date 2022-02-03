<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name' => "amor",
            'email' => 'dzamor72@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => "user",
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        for ($i = 1; $i < 11; $i++) {
            Post::create([
                "title" => "title_" . $i,
                "body" => "title_" . $i,
                "user_id" => 1,
            ]);
        }
        for ($i = 1; $i < 6; $i++) {
            Post::create([
                "title" => "title_" . $i,
                "body" => "title_" . $i,
                "user_id" => 2,
            ]);
        }
        // php artisan migrate:fresh --seed

    }
}
