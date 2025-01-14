<?php

namespace Database\Factories;

use App\Models\QuestsTest;
use App\Models\Test;
use App\Models\BlankQuest;
use App\Models\ChoiceQuest;
use App\Models\FillQuest;
use App\Models\RelationQuest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuestsTest>
 */
class QuestsTestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Случайный выбор типа вопроса
        $typeQuests = ['blank', 'choice', 'fill', 'relation'];
        $typeQuest = $this->faker->randomElement($typeQuests);

        // Выбор случайного quest_id в зависимости от типа вопроса
        switch ($typeQuest) {
            case 'blank':
                $questId = BlankQuest::inRandomOrder()->first()->id;
                break;
            case 'choice':
                $questId = ChoiceQuest::inRandomOrder()->first()->id;
                break;
            case 'fill':
                $questId = FillQuest::inRandomOrder()->first()->id;
                break;
            case 'relation':
                $questId = RelationQuest::inRandomOrder()->first()->id;
                break;
            default:
                $questId = null;
                break;
        }

        return [
            'test_id' => Test::inRandomOrder()->first()->id,
            'quest_id' => $questId,
            'type_quest' => $typeQuest,
        ];
    }
}
