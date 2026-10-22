<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Option>
 */
class OptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'option' => fake()->sentence(6),
            'description' => fake()->text(300),
            'motivation' => fake()->paragraph(6),
            'attachments' => '',
            'cost' => fake()->numberBetween(0, 100000),
            'salt' => Str::random(12),
        ];
    }
}
