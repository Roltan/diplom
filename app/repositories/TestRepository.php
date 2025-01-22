<?php

namespace App\Repositories;

use App\Models\Test;
use Illuminate\Database\Eloquent\Builder;

class TestRepository
{
    public static function findByAlias(string $alias): ?Test
    {
        return Test::query()
            ->where('url', $alias)
            ->first();
    }

    public static function searchByTest(Builder $query, string $searchTerm): Builder
    {
        return $query->where(function ($query) use ($searchTerm) {
            $query->whereHas('topic', function ($q) use ($searchTerm) {
                $q->where('topic', 'like', '%' . $searchTerm . '%');
            })->orWhere('title', 'like', '%' . $searchTerm . '%');
        });
    }

    public static function filterByTopic(Builder $query, string $topic): Builder
    {
        return $query->whereHas('topic', function ($query) use ($topic) {
            $query = $query->where('topic', $topic);
        });
    }

    public static function checkMulti(int $testId): bool
    {
        return Test::query()
            ->find($testId)
            ->is_multi;
    }
}
