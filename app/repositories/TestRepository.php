<?php

namespace App\Repositories;

use App\Models\Test;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

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

    public static function getGeneralTests(Collection $recommendedTests, int $page, int $limit): array
    {
        $allTests = Test::query()
            ->whereIn('id', $recommendedTests->keys());
        $test = $allTests
            ->skip(($page - 1) * $limit)
            ->take($limit)
            ->get();

        return [$test, $allTests->get()->count()];
    }

    public static function getAdviseGuest(int $page, int $limit, bool $only_user = true): Collection
    {
        $tests = Test::query();
        if ($only_user)
            $tests = $tests->where('only_user', 1);

        return $tests
            ->withCount('solved')
            ->orderBy('solved_count')
            ->skip(($page - 1) * $limit)
            ->take($limit)
            ->get();
    }

    public static function getAdviseUser(array $topics, array $difficulties, int $userId, int $page, int $limit): array
    {
        $tests = Test::query()
            ->whereIn('topic_id', $topics)
            ->whereIn('difficulty_id', $difficulties)
            ->where('user_id', '!=', $userId)
            ->with('topic', 'difficulty');
        $personalTests = $tests
            ->skip(($page - 1) * $limit)
            ->take($limit)
            ->get();

        return [$tests, $personalTests];
    }
}
