<?php

namespace App\Repositories;

use App\Models\BlankQuest;
use App\Models\ChoiceQuest;
use App\Models\FillQuest;
use App\Models\RelationQuest;
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

    public static function getAnswers(BlankQuest|ChoiceQuest|FillQuest|RelationQuest $quest): Collection
    {
        return $quest->questsTest()
            ->with('answers') // Жадная загрузка ответов
            ->get()
            ->pluck('answers') // Извлекаем ответы из всех questsTest
            ->flatten(); // Преобразуем коллекцию коллекций в одну коллекцию
    }
}
