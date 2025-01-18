<?php

namespace App\Services;

use App\Http\Resources\Card\SolvedResource;
use App\Http\Resources\Card\StatisticResource;
use App\Http\Resources\Card\TestCardResource;
use App\Models\SolvedTest;
use App\Models\Test;
use App\Models\Topic;
use App\Repositories\TestRepository;
use App\Repositories\TopicRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class ViewServices
{
    private function applyDateFilter(Builder $query, Request $request): Builder
    {
        $day = $request->input('day');
        $month = $request->input('month');
        $year = $request->input('year');

        if ($day !== null || $month !== null || $year !== null) {
            $query->where(function ($query) use ($day, $month, $year) {
                if ($day !== null) {
                    $query->whereDay('created_at', $day);
                }

                if ($month !== null) {
                    $query->whereMonth('created_at', $month);
                }

                if ($year !== null) {
                    $query->whereYear('created_at', $year);
                }
            });
        }

        return $query;
    }

    public function viewIndex(): array
    {
        $topic = Topic::query()
            ->orderBy('topic')
            ->get()
            ->pluck('topic');
        return ['topics' => $topic];
    }

    public function viewCreate(): string|array
    {
        $user = Auth::user();
        if ($user === null)
            return 'У вас нет прав посещать ту страницу';

        $topic = TopicRepository::getTopics();
        return ['topics' => $topic];
    }

    public function viewProfile(): string|array
    {
        $user = Auth::user();
        if ($user === null)
            return 'У вас нет прав посещать ту страницу';

        return [
            'name' => $user->name,
            'email' => $user->email
        ];
    }

    public function viewSolved(Request $request): string|array
    {
        $user = Auth::user();
        if ($user === null)
            return 'У вас нет прав посещать ту страницу';

        $solvedTest = SolvedTest::query()
            ->where('user_id', $user->id);
        $tests = $solvedTest->get();

        // Фильтрация по названию теста
        if ($request->has('test_title')) {
            $testTitle = $request->input('test_title');
            $solvedTest->whereHas('test', function ($query) use ($testTitle) {
                $query->where('title', 'like', '%' . $testTitle . '%');
            });
        }

        // Фильтрация по дате
        $solvedTest = $this->applyDateFilter(
            $solvedTest,
            $request
        );

        $solvedTest = $solvedTest->get();

        $tests = $tests->map(function ($solved) {
            return $solved->test->title;
        });
        return [
            'tests' => $tests,
            'cards' => SolvedResource::collection($solvedTest)
        ];
    }

    public function viewStatistic(Request $request): string|array
    {
        $user = Auth::user();
        if ($user === null)
            return 'У вас нет прав посещать эту страницу';

        // Получаем тесты пользователя
        $tests = Test::query()->where('user_id', $user->id);
        $testsAll = $tests->get();

        // Фильтрация по названию теста, если параметр передан
        if ($request->has('test')) {
            $testTitle = $request->input('test');
            $tests->where('title', $testTitle);
        }

        // Получаем ID тестов пользователя
        $testIds = $tests->pluck('id');

        // Запрашиваем решения (SolvedTest) для этих тестов
        $solvedTests = SolvedTest::query()
            ->whereIn('test_id', $testIds);

        // Применяем фильтрацию по дате
        $solvedTests = $this->applyDateFilter(
            $solvedTests,
            $request
        );

        // Получаем отфильтрованные решения
        $solvedTests = $solvedTests->get();

        return [
            'tests' => $testsAll->pluck('title'),
            'cards' => StatisticResource::collection($solvedTests)
        ];
    }

    public function viewTests(Request $request): string|array
    {
        $user = Auth::user();
        if ($user === null)
            return 'У вас нет прав посещать ту страницу';

        $test = Test::query()
            ->where('user_id', $user->id);

        $test = $this->applyDateFilter(
            $test,
            $request
        );

        $test = $test->get();

        return [
            'cards' => TestCardResource::collection($test)
        ];
    }
}
