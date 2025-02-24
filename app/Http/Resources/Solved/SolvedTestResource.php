<?php

namespace App\Http\Resources\Solved;

use App\Services\ViewServices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SolvedTestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->test->title,
            'topic' => $this->test->topic->topic,
            'student' => $this->student?->name ?? '',
            'grade' => $this->grade,
            'percent' => $this->percent,
            'date' => $this->created_at->format('d-m-Y'),
            'score' => $this->score,
            'solved_time' => gmdate('H:i:s', $this->solved_time),
            'isLeave' => $this->is_escapee,
            'answer' => SolvedQuestResource::collection($this->questAnswer),
        ];
    }
}
