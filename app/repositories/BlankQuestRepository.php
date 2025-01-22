<?php

namespace App\Repositories;

use App\Models\BlankQuest;

class BlankQuestRepository
{
    public static function getRandomByTopic(string $topic): ?BlankQuest
    {
        return BlankQuest::query()
            ->whereHas('topic', function ($query) use ($topic) {
                return $query->where('topic', $topic);
            })
            ->inRandomOrder()
            ->first();
    }
}
