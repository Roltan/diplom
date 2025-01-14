<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RelationQuest;
use App\Models\Topic;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RelationQuest>
 */
class RelationQuestFactory extends Factory
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

        // Генерируем случайные длины массивов
        $length = $this->faker->numberBetween(3, 6);

        // Генерируем первый массив строк
        $firstColumn = [];
        for ($i = 0; $i < $length; $i++) {
            $firstColumn[] = $this->faker->sentence(2, 4); // Строки из 2-4 слов
        }

        // Генерируем второй массив строк
        $secondColumn = [];
        for ($i = 0; $i < $length; $i++) {
            $secondColumn[] = $this->faker->sentence(2, 4); // Строки из 2-4 слов
        }

        return [
            'topic_id' => Topic::inRandomOrder()->first()->id,
            'vis' => $this->faker->boolean,
            'quest' => $quest,
            'first_column' => json_encode($firstColumn),
            'second_column' => json_encode($secondColumn),
        ];
    }
}
