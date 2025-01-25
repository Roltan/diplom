<?php

namespace Database\Factories;

use App\Models\Test;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SolvedTest>
 */
class SolvedTestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'test_id' => Test::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'score' => rand(0, 100),
            'grade' => rand(1, 5),
            'percent' => rand(0, 100),
            'is_escapee' => rand(0, 1),
            'solved_time' => rand(60, 3600), // Время решения в секундах
        ];
    }
}
