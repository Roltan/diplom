<?php

namespace App\Repositories;

use App\Models\SolvedTest;

class SolvedTestRepository
{
    public function findByUserAndTest(int $userId, int $testId): ?SolvedTest
    {
        return SolvedTest::query()
            ->where('user_id', $userId)
            ->where('test_id', $testId)
            ->first();
    }

    public function userHasSolvedTest(int $userId, int $testId): bool
    {
        return SolvedTest::query()
            ->where('user_id', $userId)
            ->where('test_id', $testId)
            ->exists();
    }

    public function calculateCorrectAnswers(SolvedTest $solvedTest): int
    {
        return $solvedTest->questAnswers->sum(function ($questAnswer) {
            return $questAnswer->countCorrect();
        });
    }
}
