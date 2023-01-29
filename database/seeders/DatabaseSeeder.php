<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PostMetaSeeder::class);
        $this->call(PostCommentSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(CategorySeeder::class);
    }
}
