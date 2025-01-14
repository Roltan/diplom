<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FillQuest;
use App\Models\Topic;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FillQuest>
 */
class FillQuestFactory extends Factory
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

        // Заменяем пробелы на s?:N в случайных местах
        $words = explode(' ', $quest);
        $replacements = [];
        for ($i = 0; $i < 3; $i++) {
            $index = $this->faker->numberBetween(0, count($words) - 1);
            $replacements[] = $index;
            $words[$index] = 's?:' . $i;
        }
        $quest = implode(' ', $words);

        // Генерируем массив массивов с опциями
        $options = [];
        foreach ($replacements as $index) {
            $option = [];
            $correctIndex = $this->faker->numberBetween(0, 3);
            for ($i = 0; $i < 4; $i++) {
                $option[] = [
                    'str' => $this->faker->word,
                    'correct' => $i === $correctIndex,
                ];
            }
            $options[] = $option;
        }

        return [
            'topic_id' => Topic::inRandomOrder()->first()->id,
            'vis' => $this->faker->boolean,
            'quest' => $quest,
            'options' => json_encode($options),
        ];
    }
}
