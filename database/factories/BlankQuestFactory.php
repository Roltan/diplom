<?php

namespace Database\Factories;

use App\Models\BlankQuest;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlankQuest>
 */
class BlankQuestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Генерируем случайный текст вопроса
        $quest = $this->faker->realText(500); // 500 символов

        // Генерируем случайный JSON массив правильных ответов
        $correct = $this->faker->randomElements(
            $this->faker->words(10), // случайное слов
            $this->faker->numberBetween(2, 5) // от 2 до 5 элементов в массиве
        );

        return [
            'topic_id' => Topic::inRandomOrder()->first()->id,
            'vis' => $this->faker->boolean,
            'quest' => $quest,
            'correct' => json_encode($correct),
            'difficulty' => $this->faker->numberBetween(0, 100)
        ];
    }
}
