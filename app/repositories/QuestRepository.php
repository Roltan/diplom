<?php

namespace App\Repositories;

use App\Models\FillQuest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class QuestRepository
{
    public static function getQuest(string $type, int $count, int $topicId, ?string $difficulty): Collection
    {
        $difficultyRange = DifficultyRepository::getRangeByTitle($difficulty);

        return DB::table($type . '_quests')
            ->where('topic_id', $topicId)
            ->where('vis', true)
            ->whereBetween('difficulty', $difficultyRange)
            ->inRandomOrder()
            ->take($count)
            ->get()
            ->map(function ($question) use ($type) {
                $question->type = $type;
                return $question;
            });
    }
}
