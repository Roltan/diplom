<?php

namespace App\Services;

use App\Http\Requests\SaveSolvedRequest;
use App\Http\Resources\Solved\SolvedQuestResource;
use App\Models\QuestAnswer;
use App\Models\SolvedTest;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SolvedTestServices
{
    public function saveSolvedTest(SaveSolvedRequest $request): Response
    {
        // общая информация о решении
        $student_id = Auth::check() ? Auth::user()->id : null;
        $test_id = Test::query()
            ->where('url', $request->test_alias)
            ->first()
            ->id;
        $solved_time = $request->time;
        $is_escape = $request->is_escape;
        $correct = 0;
        $grade = 0;
        $percent = 0;

        if (
            Auth::check() and SolvedTest::query()
            ->where('test_id', $test_id)
            ->where('user_id', $student_id)
            ->exists()
        ) return response(['status' => false, 'error' => 'Вы уже решали этот тест'], 400);
        $solvedTest = SolvedTest::create([
            'test_id' => $test_id,
            'user_id' => $student_id,
            'is_escapee' => $is_escape,
            'solved_time' => $solved_time,
        ]);

        $count = $solvedTest->test->maxScore();

        // ответы на вопросы
        foreach ($request->answer as $answer) {
            $questAnswer = QuestAnswer::create([
                'solved_test_id' => $solvedTest->id,
                'quest_test_id' => $answer['id'],
                'answer' => json_encode($answer['text'])
            ]);

            $correct += $questAnswer->countCorrect();
        }
        $percent = (int) round($correct / $count * 100);
        $grade = $this->getGrade($percent, 50, 70, 90);

        $solvedTest->score = $correct;
        $solvedTest->percent = $percent;
        $solvedTest->grade = $grade;
        $solvedTest->save();

        return response([
            'status' => true,
            'solved_id' => $solvedTest->id
        ]);
    }

    public function getSolvedTest(int $testId, int $user = null): Collection|Response
    {
        if ($user != null) {
            $user = User::find($user);
            if ($user == null)
                return response(['status' => false, 'error' => 'Пользователь не найден'], 404);

            $test = Test::find($testId);
            if ($test == null)
                return response(['status' => false, 'error' => 'Тест не найден'], 404);

            $solvedTest = $user->solvedTests()->where('test_id', $testId)->first();
            if ($solvedTest == null)
                return response(['status' => false, 'error' => 'Вы еще не решили этот тест'], 400);
        } else {
            $solvedTest = SolvedTest::find($testId);
            if ($solvedTest == null)
                return response(['status' => false, 'error' => 'Решение теста не найдено'], 404);
            $test = $solvedTest->test;
        }

        // формируем данные об ответах на вопросы теста
        $answer = new SolvedQuestResource([
            'solved_id' => $solvedTest->id,
            'quest' => $test->quest
        ]);

        return response([
            'title' => $test->title,
            'topic' => $test->topic->topic,
            'student' => ($solvedTest->student == null ? '' : $solvedTest->student->name),
            'grade' => $solvedTest->grade,
            'percent' => $solvedTest->percent,
            'date' => $solvedTest->created_at->format('d-m-Y'),
            'score' => $solvedTest->score,
            'solved_time' => Carbon::createFromTimestamp($solvedTest->solved_time)
                ->format('H:i:s'),
            'isLeave' => $solvedTest->is_escapee,
            'answer' => $answer
        ]);
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
