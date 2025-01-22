<?php

namespace App\Repositories;

use App\Models\RelationQuest;

class RelationQuestRepository
{
    public static function getRandomByTopic(string $topic): ?RelationQuest
    {
        return RelationQuest::query()
            ->whereHas('topic', function ($query) use ($topic) {
                return $query->where('topic', $topic);
            })
            ->inRandomOrder()
            ->first();
    }
}
