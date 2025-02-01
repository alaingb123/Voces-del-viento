<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(10),
            'slug' => $this->faker->slug(3),
            'image' => 'http://localhost:8000/build/assets/axie-infinity.jpg',
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'featured' => $this->faker->boolean(10),


            //
        ];
    }
}
