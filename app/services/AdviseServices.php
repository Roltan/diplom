<?php

namespace App\Services;

use App\Models\SolvedTest;
use App\Models\Test;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdviseServices
{
    public function index(Request $request)
    {
        if (Auth::check())
            return $this->AdviseUser($request);
        return $this->AdviseGuest();
    }

    protected function AdviseUser(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $topics = $this->getTopic($user);
        $difficulties = $this->getDifficulty($user);

        $personalTests = Test::query()
            ->whereIn('topic_id', $topics) // Фильтруем по темам
            ->whereIn('difficulty_id', $difficulties) // Фильтруем по сложностям
            ->with('topic', 'difficulty') // Жадная загрузка связанных данных
            ->take(10)
            ->get();
        // $personalTests = collect();

        // Если персональных рекомендаций мало, добавляем общие
        if ($personalTests->count() < 10) {
            $generalTests = $this->getGeneralTests($user);
            $personalTests = $personalTests->merge($generalTests);
        }

        // Если все еще мало, добавляем резервные рекомендации
        if ($personalTests->count() < 10) {
            $fallbackTests = $this->AdviseGuest();
            $personalTests = $personalTests->merge($fallbackTests);
        }

        return $personalTests->shuffle()->take(10);
    }

    protected function getTopic(User $user): array
    {
        $solved = $user->solvedTests()
            ->with('test.topic')
            ->get()
            ->pluck('test.topic')
            ->unique('id')
            ->pluck('id');
        $test = $user->tests()
            ->with('topic')
            ->get()
            ->pluck('topic')
            ->unique('id')
            ->pluck('id');

        return $solved->merge($test)
            ->unique()
            ->values()
            ->toArray();
    }

    protected function getDifficulty(User $user): array
    {
        $solved = $user->solvedTests()
            ->with('test.difficulty')
            ->get()
            ->pluck('test.difficulty')
            ->unique('id')
            ->pluck('id');
        $test = $user->tests()
            ->with('difficulty')
            ->get()
            ->pluck('difficulty')
            ->unique('id')
            ->pluck('id');

        return $solved->merge($test)
            ->unique()
            ->values()
            ->toArray();
    }

    protected function getGeneralTests(User $user)
    {
        // Получаем ID тестов, которые решал пользователь
        $solvedTestIds = $user->solvedTests()->pluck('test_id');

        if ($solvedTestIds->isEmpty())
            return collect();


        // Находим пользователей, которые решали те же тесты, и считаем количество общих тестов
        $similarUsers = SolvedTest::query()
            ->whereIn('test_id', $solvedTestIds)
            ->where('user_id', '!=', $user->id) // Исключаем текущего пользователя
            ->groupBy('user_id')
            ->selectRaw('user_id, COUNT(*) as common_tests_count')
            ->orderByDesc('common_tests_count')
            ->get();

        if ($similarUsers->isEmpty())
            return collect();


        $userWeights = $similarUsers->pluck('common_tests_count', 'user_id');

        // Находим тесты, которые решали похожие пользователи
        $recommendedTests = SolvedTest::query()
            ->whereIn('user_id', $userWeights)
            ->whereNotIn('test_id', $solvedTestIds) // Исключаем тесты, которые уже решал пользователь
            ->get()
            ->groupBy('test_id') // Группируем по ID теста
            ->map(function ($solvedTests) use ($userWeights) {
                // Считаем общий вес для каждого теста
                return $solvedTests->sum(function ($solvedTest) use ($userWeights) {
                    return $userWeights[$solvedTest->user_id] ?? 0;
                });
            })
            ->sortDesc() // Сортируем по весу
            ->take(10); // Ограничиваем количество

        if ($recommendedTests->isEmpty())
            return collect();

        return $recommendedTests;
    }

    protected function AdviseGuest()
    {
        return Test::query()
            ->withCount('solved')
            ->orderBy('solved_count')
            ->take(10)
            ->get();
    }
}
