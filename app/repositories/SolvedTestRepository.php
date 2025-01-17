<?php

namespace App\Repositories;

use App\Models\SolvedTest;

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
}
