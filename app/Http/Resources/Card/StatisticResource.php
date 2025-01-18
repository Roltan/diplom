<?php

namespace App\Http\Resources\Card;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatisticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $test = $this->test;
        $student = ($this->student == null ? 'Неавторизованный пользователь' : $this->student->name);

        return [
            'href' => '/solved' . '/' . $this->id,
            'span' => [
                $student,
                $this->score . '/' . $test->maxScore(),
                $test->title,
                $this->created_at->format('d.m.Y')
            ]
        ];
    }
}
