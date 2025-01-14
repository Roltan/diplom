<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class QuestsTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_id',
        'quest_id',
        'type_quest'
    ];

    // связи
    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }

    public function quest(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'type_quest', 'quest_id');
    }
}
