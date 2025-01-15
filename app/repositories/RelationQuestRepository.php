<?php

namespace App\Repositories;

use App\Models\RelationQuest;

class RelationQuestRepository
{
    public function getRandomByTopic(int $topicId): ?RelationQuest
    {
        return RelationQuest::query()
            ->where('topic_id', $topicId)
            ->inRandomOrder()
            ->first();
    }
}
