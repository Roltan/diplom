<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Difficulty extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'min_value',
        'max_value'
    ];

    public function test(): HasMany
    {
        return $this->hasMany(Test::class);
    }
}
