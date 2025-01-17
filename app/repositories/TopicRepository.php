<?php

namespace App\Repositories;

use App\Models\Topic;

class TopicRepository
{
    public static function getByName(string $name): ?Topic
    {
        return Topic::query()->where('topic', $name)->first();
    }
}
