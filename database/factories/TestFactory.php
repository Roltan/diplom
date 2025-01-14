<?php

namespace Database\Factories;

use App\Models\Test;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Test>
 */
class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Генерируем случайное название теста
        $title = $this->faker->sentence(3);

        // Генерируем уникальный URL из названия теста
        $url = Str::slug($title);

        // Проверяем уникальность URL
        while (Test::query()->where('url', $url)->exists()) {
            $title = $this->faker->sentence(3);
            $url = Str::slug($title);
        }

        return [
            'user_id' => 3, // Фиксированный user_id
            'topic_id' => Topic::inRandomOrder()->first()->id,
            'title' => $title,
            'url' => $url,
            'only_user' => $this->faker->boolean(),
        ];
    }
}
