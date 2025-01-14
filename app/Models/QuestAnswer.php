<?php

namespace App\Models;

use App\Services\AnswerServices;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'solved_test_id',
        'quest_test_id',
        'answer'
    ];

    // связи
    public function solvedTest(): BelongsTo
    {
        return $this->belongsTo(SolvedTest::class, 'solved_test_id');
    }

    public function questsTest(): BelongsTo
    {
        return $this->belongsTo(QuestsTest::class, 'quest_test_id');
    }

    // методы
    public function checkAnswer(): array
    {
        $service = new AnswerServices();
        return $service->indexCheck($this);
    }

    public function countCorrect(): int
    {
        $service = new AnswerServices();
        return $service->countCorrect($this);
    }
}
