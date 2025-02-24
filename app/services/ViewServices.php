<?php

namespace app\Services;

use App\Http\Resources\Card\AdviseCardResource;
use App\Http\Resources\Card\SolvedResource;
use App\Http\Resources\Card\StatisticResource;
use App\Http\Resources\Card\TestCardResource;
use app\Services\AdviseServices;
use App\Models\SolvedTest;
use App\Models\Test;
use App\Models\Topic;
use App\Repositories\DifficultyRepository;
use App\Repositories\TopicRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewServices
{
    public function viewIndex(): array
    {
        $topic = TopicRepository::getTopics();
        $difficulties = DifficultyRepository::getDifficulties();
        $tests = (new AdviseServices)->index(request());
        return [
            'topics' => $topic,
            'difficulties' => $difficulties,
            'cards' => AdviseCardResource::collection($tests)
        ];
    }

    public function viewCreate(): string|array
    {
        $user = Auth::user();
        if ($user === null)
            return 'У вас нет прав посещать ту страницу';

        $topic = TopicRepository::getTopics();
        $difficulties = DifficultyRepository::getDifficulties();
        return [
            'topics' => $topic,
            'difficulties' => $difficulties
        ];
    }

    public function viewProfile(): string|array
    {
        $user = Auth::user();
        if ($user === null)
            return 'У вас нет прав посещать ту страницу';

        return [
            'id' => $user->id,
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
        if ($request->has('test_title'))
            $solvedTest->filterByTestTitle($request->input('test_title'));

        if ($request->has('filter-search'))
            $solvedTest = $solvedTest->searchInSolved($request->input('filter-search'));

        // Фильтрация по дате
        if ($request->has('filter-date'))
            $solvedTest = $solvedTest->whereDate('created_at', $request->input('filter-date'));

        $solvedTest = $solvedTest
            ->orderByDesc('created_at')
            ->get();

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
        if ($request->has('filter-test'))
            $tests->where('title', $request->input('filter-test'));

        // Получаем ID тестов пользователя
        $testIds = $tests->pluck('id');

        // Запрашиваем решения (SolvedTest) для этих тестов
        $solvedTests = SolvedTest::query()
            ->whereIn('test_id', $testIds);

        if ($request->has('filter-search'))
            $solvedTests = $solvedTests->searchByStatistic($request->input('filter-search'));

        // Применяем фильтрацию по дате
        if ($request->has('filter-date'))
            $solvedTests = $solvedTests->whereDate('created_at', $request->input('filter-date'));

        // Получаем отфильтрованные решения
        $solvedTests = $solvedTests
            ->orderByDesc('created_at')
            ->get();

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

        if ($request->has('filter-topic'))
            $test = $test->filterByTopic($request->input('filter-topic'));

        if ($request->has('filter-search'))
            $test = $test->searchByTest($request->input('filter-search'));

        if ($request->has('filter-date'))
            $test = $test->whereDate('created_at', $request->input('filter-date'));

        $test = $test
            ->orderByDesc('created_at')
            ->get();

        return [
            'topic' => TopicRepository::getTopics(),
            'cards' => TestCardResource::collection($test)
        ];
    }
}
