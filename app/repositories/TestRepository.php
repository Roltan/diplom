<?php

namespace App\Repositories;

use App\Models\Test;
use Illuminate\Database\Eloquent\Builder;

class TestRepository
{
    public static function findByAlias(string $alias): ?Test
    {
        return Test::query()
            ->where('url', $alias)
            ->first();
    }

    public static function searchByTest(Builder $query, string $searchTerm): Builder
    {
        return $query->where(function ($query) use ($searchTerm) {
            $query->whereHas('topic', function ($q) use ($searchTerm) {
                $q->where('topic', 'like', '%' . $searchTerm . '%');
            })->orWhere('title', 'like', '%' . $searchTerm . '%');
        });
    }
}
