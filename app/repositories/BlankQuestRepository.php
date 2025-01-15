<?php

namespace App\Repositories;

use App\Models\BlankQuest;

class BlankQuestRepository
{
    public function getRandomByTopic(int $topicId): ?BlankQuest
    {
        return BlankQuest::query()
            ->where('topic_id', $topicId)
            ->inRandomOrder()
            ->first();
    }
}
