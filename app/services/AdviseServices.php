<?php

namespace app\Services;

use App\Http\Resources\Card\TestCardResource;
use App\Models\SolvedTest;
use App\Models\Test;
use App\Models\User;
use App\Repositories\SolvedTestRepository;
use App\Repositories\TestRepository;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdviseServices
{
    public function index(Request $request): Collection
    {
        $page = (int) $request->input('page', 1);
        $limit = 20;

        if ($request->hasAny('filter-search', 'filter-date', 'filter-topic'))
            return $this->filter($request, $page, $limit, Auth::check());

        return Auth::check() ?
            $this->AdviseUser($page, $limit) :
            TestRepository::getAdviseQuest($page, $limit, false);
    }

    protected function AdviseUser(int $page, int $limit): Collection
    {
        $user = User::find(Auth::user()->id);
        $topics = $user->getAdviseTopic();
        $difficulties = $user->getAdviseDifficulty();

        [$testsCount, $personalTests] = TestRepository::getAdviseUser(
            $topics,
            $difficulties,
            $user->id,
            $page,
            $limit
        );

        // Если персональных рекомендаций мало, добавляем общие
        if ($personalTests->count() < $limit) {
            $generalPage = max(1, $page - ceil($testsCount / $limit));
            [$generalTests, $generalTestsCount] = $this->getGeneralTests($user, $generalPage, $limit);
            $personalTests = $personalTests->merge($generalTests);
        }

        // Если все еще мало, добавляем резервные рекомендации
        if ($personalTests->count() < $limit) {
            $generalPage = max(1, $page - ceil($testsCount + $generalTestsCount / $limit));
            $fallbackTests = TestRepository::getAdviseQuest($generalPage, $limit);
            $personalTests = $personalTests->merge($fallbackTests);
        }

        return $personalTests->shuffle()->take($limit);
    }

    protected function getGeneralTests(User $user, int $page, int $limit): array
    {
        // Получаем ID тестов, которые решал пользователь
        $solvedTestIds = $user->solvedTests()->pluck('test_id');
        if ($solvedTestIds->isEmpty()) return [collect(), 0];
        $solvedTestIds = $solvedTestIds->toArray();

        // Находим пользователей, которые решали те же тесты, и считаем количество общих тестов
        $similarUsers = SolvedTestRepository::getSimilarUsers($solvedTestIds, $user->id);
        if ($similarUsers->isEmpty()) return [collect(), 0];

        $recommendedTests = SolvedTestRepository::getRecommendedTests($solvedTestIds, $similarUsers);
        if ($recommendedTests->isEmpty()) return [collect(), 0];

        return TestRepository::getGeneralTests($recommendedTests, $page, $limit);
    }

    protected function filter(Request $request, int $page, int $limit, bool $only_user = true): Collection
    {
        $test = Test::query();

        if ($only_user)
            $test = $test->where('only_user', 1);

        if ($request->has('filter-topic'))
            $test = $test->filterByTopic($request->input('filter-topic'));

        if ($request->has('filter-search'))
            $test = $test->searchByTest($request->input('filter-search'));

        if ($request->has('filter-date'))
            $test = $test->whereDate('created_at', $request->input('filter-date'));

        $test = $test->skip(($page - 1) * $limit)
            ->where('is_public', 1)
            ->take($limit)
            ->get();

        return collect()
            ->merge(TestCardResource::collection($test));
    }
}
