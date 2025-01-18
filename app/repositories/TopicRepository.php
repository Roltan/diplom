<?php

namespace App\Repositories;

use App\Models\Topic;

class TopicRepository
{
    public static function getByName(string $name): ?Topic
    {
        return Topic::query()
            ->where('topic', $name)
            ->first();
    }

    public static function getTopics(): array
    {
        return Topic::query()
            ->orderBy('topic')
            ->get()
            ->pluck('topic')
            ->toArray();
    }
}
