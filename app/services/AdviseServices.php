<?php

namespace App\Services;

use App\Models\SolvedTest;
use App\Models\Test;
use App\Models\User;
use App\Repositories\SolvedTestRepository;
use App\Repositories\TestRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdviseServices
{
    public function index(Request $request): Collection
    {
        $page = $request->input('page', 1);
        $limit = 20;

        if (Auth::check())
            return $this->AdviseUser($page, $limit);
        return $this->AdviseGuest($page, $limit);
    }

    protected function AdviseUser(int $page, int $limit): Collection
    {
        $user = User::find(Auth::user()->id);
        $topics = $user->getAdviseTopic();
        $difficulties = $user->getAdviseDifficulty();

        [$tests, $personalTests] = TestRepository::getAdviseUser(
            $topics,
            $difficulties,
            $user->id,
            $page,
            $limit
        );

        // Если персональных рекомендаций мало, добавляем общие
        if ($personalTests->count() < $limit) {
            $generalPage = max(1, $page - ceil($tests->count() / $limit));
            $generalTests = $this->getGeneralTests($user, $generalPage, $limit);
            $personalTests = $personalTests->merge($generalTests[0]);
        }

        // Если все еще мало, добавляем резервные рекомендации
        if ($personalTests->count() < $limit) {
            $generalPage = max(1, $page - ceil($tests->count() + $generalTests[1] / $limit));
            $fallbackTests = $this->AdviseGuest($generalPage, $limit);
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

    protected function AdviseGuest(int $page, int $limit): Collection
    {
        return TestRepository::getAdviseGuest($page, $limit);
    }
}
