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
        $services = new AnswerServices;
        // цикл по всем переданным заданиям
        $data = $this['quest']->map(function ($quest) use ($services) {
            $answer =  $services->indexCheck($quest);
            $answer['id'] = $quest->id;
            return $answer;
        })->filter()->values();

        $data = json_encode($data);
        $data = json_decode($data, true);

        return $data;
    }
}
