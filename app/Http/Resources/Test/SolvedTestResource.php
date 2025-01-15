<?php

namespace App\Http\Resources\test;

use App\Http\Resources\Solved\SolvedQuestResource;
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
            'solved_time' => Carbon::createFromTimestamp($this->solved_time)->format('H:i:s'),
            'isLeave' => $this->is_escapee,
            'answer' => new SolvedQuestResource([
                'solved_id' => $this->id,
                'quest' => $this->test->quest,
            ]),
        ];
    }
}
