<?php

namespace App\Http\Resources\Test;

use App\Repositories\DifficultyRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DescriptionTestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'only_user' => $this->only_user,
            'user_id' => Auth::user()->id,
            'url' => Str::slug($this->title),
            'topic_id' => $this->topic_id,
            'max_time' => $this->max_time,
            'is_multi' => $this->is_multi,
            'difficulty_id' => DifficultyRepository::getIdByTitle($this->difficulty)
        ];
    }
}
