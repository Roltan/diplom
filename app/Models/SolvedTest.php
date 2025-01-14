<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SolvedTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_id',
        'user_id',
        'score',
        'grade',
        'percent',
        'is_escapee',
        'solved_time',
    ];

    // связи
    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function questAnswer(): HasMany
    {
        return $this->hasMany(QuestAnswer::class);
    }
}
