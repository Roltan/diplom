<?php

namespace App\Repositories;

use App\Models\ChoiceQuest;

class ChoiceQuestRepository
{
    public function getRandomByTopic(int $topicId): ?ChoiceQuest
    {
        return ChoiceQuest::query()
            ->where('topic_id', $topicId)
            ->inRandomOrder()
            ->first();
    }
}
