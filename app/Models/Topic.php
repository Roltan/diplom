<?php

namespace App\Models;

use Filament\Notifications\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic',
    ];

    // связи
    public function tests(): HasMany
    {
        return $this->hasMany(Test::class);
    }

    public function questionsType1(): HasMany
    {
        return $this->hasMany(BlankQuest::class, 'topic_id');
    }

    public function questionsType2(): HasMany
    {
        return $this->hasMany(ChoiceQuest::class, 'topic_id');
    }

    public function questionsType3(): HasMany
    {
        return $this->hasMany(FillQuest::class, 'topic_id');
    }

    public function questionsType4(): HasMany
    {
        return $this->hasMany(RelationQuest::class, 'topic_id');
    }


    // методы
    public function quests(): Collection
    {
        $questions = collect();

        $questions = $questions->merge($this->questionsType1);
        $questions = $questions->merge($this->questionsType2);
        $questions = $questions->merge($this->questionsType3);
        $questions = $questions->merge($this->questionsType4);

        return $questions;
    }
}
