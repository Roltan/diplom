<?php

namespace App\Repositories;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicRepository
{
    public static function findByRequest(Request $request): ?Topic
    {
        return Topic::query()
            ->where('topic', $request->topic)
            ->first();
    }

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
