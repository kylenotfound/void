<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory {

    public function definition(): array {
        $title = $this->faker->sentence;

        return [
            'user_id' => 1,
            'title' => $title,
            'slug' => Str::kebab($title),
            'content' => $this->faker->paragraphs(30, true),
            'view_count' => 0,
        ];
    }
}
