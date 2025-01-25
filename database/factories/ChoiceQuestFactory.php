<?php

namespace Database\Factories;

use App\Models\ChoiceQuest;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChoiceQuest>
 */
class ChoiceQuestFactory extends Factory
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
            $this->faker->words(10), // 10 случайных слов
            $this->faker->numberBetween(1, 3) // от 1 до 3 элементов в массиве
        );

        // Генерируем случайный JSON массив неправильных ответов
        $uncorrect = $this->faker->randomElements(
            $this->faker->words(10), // 10 случайных слов
            $this->faker->numberBetween(3, 6) // от 3 до 6 элементов в массиве
        );

        return [
            'topic_id' => Topic::inRandomOrder()->first()->id,
            'vis' => $this->faker->boolean,
            'quest' => $quest,
            'correct' => json_encode($correct),
            'uncorrect' => json_encode($uncorrect),
            'is_multiple' => $this->faker->boolean,
            'difficulty' => $this->faker->numberBetween(0, 100)
        ];
    }
}
