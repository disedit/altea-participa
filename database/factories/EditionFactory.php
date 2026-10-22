<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Edition>
 */
class EditionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = Carbon::today()->subWeeks(1);
        $endDate = Carbon::today()->addWeeks(1);

        return [
            'name' => 'Test edition',
            'description' => fake()->paragraph(2, false),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'publish_results' => $endDate,
            'docs' => "Document 1\nDocument 2",
            'voting_places' => "Ajuntament\nBiblioteca",
            'sidebar' => '',
            'published' => 1,
        ];
    }
}
