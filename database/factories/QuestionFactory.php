<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question' => fake()->sentence(12),
            'description' => fake()->paragraph(2),
            'template' => fake()->randomElement(['cards', 'simple', '2column']),
            'min_options' => 0,
            'max_options' => fake()->numberBetween(1, 3),
            'display_cost' => fake()->boolean(),
            'random_order' => fake()->boolean(),
        ];
    }
}
