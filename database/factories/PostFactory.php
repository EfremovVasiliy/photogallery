<?php

namespace Database\Factories;

use App\Models\User;
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
        return [
            'title' => fake()->text(30),
            'user_id' => mt_rand(1, 10),
            'description' => fake()->text(130),
            'file_path' => 'uploads/dLll55WVKlTbEAGyTi9X5dB1iLDoVxFC1B3yiXH8.jpg'
        ];
    }
}
