<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostMeta;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create()->each(function($user){
            $user->posts()->saveMany(Post::factory(mt_rand(1,3))->make());
        });
    }
}
