<?php

namespace App\Repositories;

use App\Models\Difficulty;

class DifficultyRepository
{
    public static function getDifficulties(): array
    {
        return Difficulty::all()
            ->pluck('title')
            ->toArray();
    }

    public static function getRangeByTitle(?string $difficulty): array
    {
        $result = Difficulty::query()
            ->where('title', $difficulty)
            ->firstOr(callback: fn() => (object) ['min_value' => 0, 'max_value' => 100]);

        return [
            'min_value' => $result->min_value,
            'max_value' => $result->max_value,
        ];
    }
}
