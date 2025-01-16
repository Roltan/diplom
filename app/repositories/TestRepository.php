<?php

namespace App\Repositories;

use App\Models\Test;
use Illuminate\Database\Eloquent\Collection;

class TestRepository
{
    public function findByAlias(string $alias): ?Test
    {
        return Test::query()
            ->where('url', $alias)
            ->first();
    }

    public static function findByUser(int $userId): array|Collection
    {
        return Test::query()
            ->where('user_id', $userId)
            ->get();
    }
}
