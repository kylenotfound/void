<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence;

        return [
            'user_id' => 1,
            'title' => $title,
            'slug' => Str::kebab($title),
            'content' => $this->faker->paragraph,
            'view_count' => rand(100, 1000000),
        ];
    }
}
