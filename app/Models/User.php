<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'token'
    ];

    protected $hidden = [
        'password',
    ];

    // связи
    public function canAccessPanel($panel): bool
    {
        return $this->is_admin;
    }

    public function solvedTests(): HasMany
    {
        return $this->hasMany(SolvedTest::class);
    }

    public function tests(): HasMany
    {
        return $this->hasMany(Test::class);
    }

    // методы
    public function getAdviseTopic(): array
    {
        $solved = $this->solvedTests()
            ->with('test.topic')
            ->get()
            ->pluck('test.topic')
            ->unique('id')
            ->pluck('id');
        $test = $this->tests()
            ->with('topic')
            ->get()
            ->pluck('topic')
            ->unique('id')
            ->pluck('id');

        return $solved->merge($test)
            ->unique()
            ->values()
            ->toArray();
    }

    public function getAdviseDifficulty(): array
    {
        $solved = $this->solvedTests()
            ->with('test.difficulty')
            ->get()
            ->pluck('test.difficulty')
            ->unique('id')
            ->pluck('id');
        $test = $this->tests()
            ->with('difficulty')
            ->get()
            ->pluck('difficulty')
            ->unique('id')
            ->pluck('id');

        return $solved->merge($test)
            ->unique()
            ->values()
            ->toArray();
    }
}
