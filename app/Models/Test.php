<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'topic_id',
        'difficulty_id',
        'title',
        'url',
        'only_user',
        'max_time',
        'is_multi'
    ];

    // связи
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function quest(): HasMany
    {
        return $this->hasMany(QuestsTest::class, 'test_id');
    }

    public function solved(): HasMany
    {
        return $this->HasMany(SolvedTest::class);
    }

    public function difficulty(): BelongsTo
    {
        return $this->belongsTo(Difficulty::class);
    }

    // методы
    public function maxScore(): int
    {
        $quests = $this->quest;
        $count = 0;
        foreach ($quests as $quest) {
            switch ($quest->type_quest) {
                case "blank":
                    $count++;
                    break;
                case "choice":
                    $count += count(json_decode($quest->quest->correct));
                    $count += count(json_decode($quest->quest->uncorrect));
                    break;
                case "fill":
                    $count += count(json_decode($quest->quest->options));
                    break;

                case "relation":
                    $count += count(json_decode($quest->quest->second_column));
                    break;
            }
        }
        return $count;
    }
}
