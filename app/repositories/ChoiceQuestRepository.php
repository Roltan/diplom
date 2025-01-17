<?php

namespace App\Repositories;

use App\Models\ChoiceQuest;

class ChoiceQuestRepository
{
    public static function getRandomByTopic(int $topicId): ?ChoiceQuest
    {
        return ChoiceQuest::query()
            ->where('topic_id', $topicId)
            ->inRandomOrder()
            ->first();
    }
}
