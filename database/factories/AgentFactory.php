<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\agent>
 */
class AgentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'userId' => fake()->numberBetween(1,10),
            'status' => fake()->randomElement(['active','deactive']),
            'city' => fake()->numberBetween(1,10)
        ];
    }
}
