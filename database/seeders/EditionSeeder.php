<?php

namespace Database\Seeders;

use App\Edition;
use App\Option;
use App\Question;
use App\Voter;
use Illuminate\Database\Seeder;

class EditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Edition::factory()->count(1)->create()->each(function (Edition $edition) {
            $edition->voters()->saveMany(Voter::factory()->count(2000)->make());
            $questions = $edition->questions()->saveMany(Question::factory()->count(4)->make());

            foreach ($questions as $question) {
                $question->options()->saveMany(Option::factory()->count(rand(3, 10))->make());
            }
        });
    }
}
