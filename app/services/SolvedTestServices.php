<?php

namespace App\Services;

use App\Http\Requests\SaveSolvedRequest;
use App\Http\Resources\Solved\SolvedTestResource;
use App\Models\QuestAnswer;
use App\Models\SolvedTest;
use App\Models\Test;
use App\Models\User;
use App\Repositories\SolvedTestRepository;
use App\Repositories\TestRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SolvedTestServices
{
    public function saveSolvedTest(SaveSolvedRequest $request): Response
    {
        $studentId = Auth::check() ? Auth::user()->id : null;
        $test = TestRepository::findByAlias($request->test_alias);

        if ($test === null)
            return response(['status' => false, 'error' => 'Тест не найден'], 404);

        if ($this->userHasSolvedTest($test->id))
            return response(['status' => false, 'error' => 'Вы уже решали этот тест'], 400);

        $solvedTest = SolvedTest::create([
            'test_id' => $test->id,
            'user_id' => $studentId,
            'solved_time' => $request->time,
            'is_escapee' => $request->is_escape,
        ]);

        $this->saveAnswers($solvedTest, $request->answer);
        $this->updateSolvedTestScore($solvedTest);

        return response([
            'status' => true,
            'solved_id' => $solvedTest->id
        ]);
    }

    public static function userHasSolvedTest(int $testId): bool
    {
        if (!TestRepository::checkMulti($testId)) {
            $studentId = Auth::check() ? Auth::user()->id : null;
            if (SolvedTestRepository::userHasSolvedTest($studentId, $testId))
                return true;
        }
        return false;
    }

    protected function saveAnswers(SolvedTest $solvedTest, array $answers): void
    {
        foreach ($answers as $answer) {
            QuestAnswer::create([
                'solved_test_id' => $solvedTest->id,
                'quest_test_id' => $answer['id'],
                'answer' => json_encode($answer['text']),
            ]);
        }
    }

    protected function updateSolvedTestScore(SolvedTest $solvedTest): void
    {
        $correct = SolvedTestRepository::calculateCorrectAnswers($solvedTest);
        $percent = (int) round($correct / $solvedTest->test->maxScore() * 100);
        $grade = $this->getGrade($percent, 50, 70, 90);

        $solvedTest->update([
            'score' => $correct,
            'percent' => $percent,
            'grade' => $grade,
        ]);
    }

    public function getSolvedTest(int $testId, int $userId = null): Response|SolvedTestResource
    {
        $solvedTest = $userId !== null
            ? $this->getSolvedTestByUser($testId, $userId)
            : SolvedTest::find($testId);

        if ($solvedTest === null) {
            return response(['status' => false, 'error' => 'Решение теста не найдено'], 404);
        }

        return new SolvedTestResource($solvedTest);
    }

    protected function getSolvedTestByUser(int $testId, int $userId): ?SolvedTest
    {
        $user = User::find($userId);
        if ($user === null) {
            return null;
        }

        $test = Test::find($testId);
        if ($test === null) {
            return null;
        }

        return SolvedTestRepository::findByUserAndTest($userId, $testId);
    }

    protected function getGrade(int $percent, int $end2, int $end3, int $end4): int
    {
        if ($percent >= 0 && $percent < $end2) {
            return 2;
        } elseif ($percent >= $end2 && $percent < $end3) {
            return 3;
        } elseif ($percent >= $end3 && $percent < $end4) {
            return 4;
        }
        return 5;
    }
}
