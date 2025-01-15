<?php

namespace App\Repositories;

use App\Models\Test;

class TestRepository
{
    public function findByAlias(string $alias): ?Test
    {
        return Test::query()->where('url', $alias)->first();
    }
}
