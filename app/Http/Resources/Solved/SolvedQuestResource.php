<?php

namespace App\Http\Resources\Solved;

use App\Models\QuestAnswer;
use App\Services\AnswerServices;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SolvedQuestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // в this хранится QuestAnswer
        $data = $this->checkAnswer();
        $data['id'] = $this->solved_test_id;

        return $data;
    }
}
