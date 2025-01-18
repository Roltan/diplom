<?php

namespace App\Providers;

use App\Models\BlankQuest;
use App\Models\ChoiceQuest;
use App\Models\FillQuest;
use App\Models\RelationQuest;
use App\Repositories\SolvedTestRepository;
use App\Repositories\TestRepository;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Builder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        JsonResource::withoutWrapping();

        Relation::morphMap([
            'blank' => BlankQuest::class,
            'choice' => ChoiceQuest::class,
            'relation' => RelationQuest::class,
            'fill' => FillQuest::class
        ]);

        // Регистрируем макросы для Test
        Builder::macro('searchByTest', function (string $searchTerm) {
            return TestRepository::searchByTest($this, $searchTerm);
        });
        // Регистрируем макросы для SolvedTest
        Builder::macro('filterByTestTitle', function (string $testTitle) {
            return SolvedTestRepository::filterByTestTitle($this, $testTitle);
        });
        Builder::macro('searchInSolved', function (string $searchTerm) {
            return SolvedTestRepository::searchBySolved($this, $searchTerm);
        });
        Builder::macro('searchByStatistic', function (string $searchTerm) {
            return SolvedTestRepository::searchByStatistic($this, $searchTerm);
        });
    }
}
