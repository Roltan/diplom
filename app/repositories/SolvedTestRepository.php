<?php

namespace App\Repositories;

use App\Models\SolvedTest;
use Illuminate\Database\Eloquent\Builder;

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
}
