<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = fake()->randomElement(['pending', 'published', 'draft', 'private']);
        return [
            'title' => fake()->text(20),
            'slug' => fake()->slug(),
            'description' => fake()->text(100),
            'content' => fake()->text(200),
            'status' => $status,
            'published_at' => $status == 'published' ? fake()->dateTime() : null,
        ];
    }
}
