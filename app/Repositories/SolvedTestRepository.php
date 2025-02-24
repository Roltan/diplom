<?php

namespace App\Repositories;

use App\Models\SolvedTest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class SolvedTestRepository
{
    public static function findByUserAndTest(int $userId, int $testId): ?SolvedTest
    {
        return SolvedTest::query()
            ->where('user_id', $userId)
            ->where('test_id', $testId)
            ->first();
    }

    public static function userHasSolvedTest(int $userId, int $testId): bool
    {
        return SolvedTest::query()
            ->where('user_id', $userId)
            ->where('test_id', $testId)
            ->exists();
    }

    public static function calculateCorrectAnswers(SolvedTest $solvedTest): int
    {
        return $solvedTest->questAnswer->sum(function ($questAnswer) {
            return $questAnswer->countCorrect();
        });
    }

    public static function filterByTestTitle(Builder $query, string $testTitle): Builder
    {
        return $query->whereHas('test', function ($query) use ($testTitle) {
            $query->where('title', $testTitle);
        });
    }

    public static function searchBySolved(Builder $query, string $searchTerm): Builder
    {
        return $query->whereHas('test', function ($query) use ($searchTerm) {
            $query->whereHas('teacher', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            })->orWhere('title', 'like', '%' . $searchTerm . '%');
        });
    }

    public static function searchByStatistic(Builder $query, string $searchTerm): Builder
    {
        return $query->whereHas('student', function ($query) use ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%');
        })->orWhereHas('test', function ($query) use ($searchTerm) {
            $query->where('title', 'like', '%' . $searchTerm . '%');
        });
    }

    public static function getSimilarUsers(array $solvedTestIds, int $userId): Collection
    {
        return SolvedTest::query()
            ->whereIn('test_id', $solvedTestIds)
            ->where('user_id', '!=', $userId)
            ->groupBy('user_id')
            ->selectRaw('user_id, COUNT(*) as common_tests_count')
            ->orderByDesc('common_tests_count')
            ->get();
    }

    public static function getRecommendedTests(array $solvedTestIds, Collection $similarUsers): Collection
    {
        $userArr = $similarUsers->pluck('user_id');
        $userWeights = $similarUsers->pluck('common_tests_count', 'user_id');

        // Находим тесты, которые решали похожие пользователи
        return SolvedTest::query()
            ->whereIn('user_id', $userArr)
            ->whereNotIn('test_id', $solvedTestIds) // Исключаем тесты, которые уже решал пользователь
            ->get()
            ->groupBy('test_id') // Группируем по ID теста
            ->map(function ($solvedTests) use ($userWeights) {
                // Считаем общий вес для каждого теста
                return $solvedTests->sum(function ($solvedTest) use ($userWeights) {
                    return $userWeights[$solvedTest->user_id] ?? 0;
                });
            })
            ->sortDesc();
    }
}
