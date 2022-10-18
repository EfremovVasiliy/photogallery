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
    public function definition($userId = null)
    {
        return [
            'title' => fake()->text(30),
            'user_id' => $userId ? $userId : mt_rand(1, 10),
            'description' => fake()->text(130),
            'file_path' => 'uploads/j8G1bPDD8p36B1JqNEwI47N9k43zsW4YQ17LRf6F.jpg'
        ];
    }
}
