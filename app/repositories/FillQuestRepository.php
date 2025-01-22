<?php

namespace App\Repositories;

use App\Models\FillQuest;

class FillQuestRepository
{
    public static function getRandomByTopic(string $topic): ?FillQuest
    {
        return FillQuest::query()
            ->whereHas('topic', function ($query) use ($topic) {
                return $query->where('topic', $topic);
            })
            ->inRandomOrder()
            ->first();
    }
}
