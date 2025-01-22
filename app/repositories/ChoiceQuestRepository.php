<?php

namespace App\Repositories;

use App\Models\ChoiceQuest;

class ChoiceQuestRepository
{
    public static function getRandomByTopic(string $topic): ?ChoiceQuest
    {
        return ChoiceQuest::query()
            ->whereHas('topic', function ($query) use ($topic) {
                return $query->where('topic', $topic);
            })
            ->inRandomOrder()
            ->first();
    }
}
