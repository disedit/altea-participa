<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Voter>
 */
class VoterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dni = fake()->unique()->dni();

        return [
            'SID' => config('participa.hashed_SIDs') ? hash('sha256', $dni) : $dni,
            'SMS_phone' => '',
            'SMS_token' => '',
            'SMS_attempts' => 0,
            'SMS_verified' => 0,
            'SMS_time' => null,
            'ballot_cast' => 0,
            'ballot_time' => null,
            'signature' => '',
            'by_user_id' => null,
            'ip_address' => '',
            'user_agent' => '',
        ];
    }
}
