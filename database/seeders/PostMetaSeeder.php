<?php

namespace Database\Seeders;

use App\Models\PostMeta;
use Illuminate\Database\Seeder;

class PostMetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostMeta::factory(10)->create();
    }
}
