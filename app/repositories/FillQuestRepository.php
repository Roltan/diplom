<?php

namespace App\Repositories;

use App\Models\FillQuest;

class FillQuestRepository
{
    public static function getRandomByTopic(string $topic): ?FillQuest
    {
        return FillQuest::query()
            ->whereHas('topic', fn($q) => $q->where('topic', $topic))
            ->inRandomOrder()
            ->first();
    }
}
