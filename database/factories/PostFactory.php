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
        return [
            'title' => $this->faker->word(),
            'content' => $this->faker->paragraph(),
            'likes' => $this->faker->randomDigit(),
            'dislikes' => $this->faker->randomDigit(),
            'views' => $this->faker->randomDigit(),
        ];
    }
}
