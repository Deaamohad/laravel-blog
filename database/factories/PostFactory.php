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
    public function definition(): array
    {

        $created = fake()->dateTimeBetween('-2 month', 'now');

        return [
            'title' => fake()->sentence(),
            'content' => fake()->paragraph(7),
            'created_at' => $created,
            'updated_at' => fake()->dateTimeBetween($created, 'now'),
            'user_id' =>  User::factory()
            ];
    }
}
