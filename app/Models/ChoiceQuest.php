<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class ChoiceQuest extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic_id',
        'vis',
        'quest',
        'correct',
        'uncorrect',
        'is_multiple',
        'difficulty'
    ];

    protected $appends = ['type'];

    // связи
    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function questsTest(): MorphOne
    {
        return $this->morphOne(QuestsTest::class, 'quest', 'type_quest');
    }

    // методы
    public function maxScore(): int
    {
        return count(json_decode($this->correct))
            + count(json_decode($this->uncorrect));
    }

    public function getTypeAttribute(): string
    {
        return 'choice';
    }
}
