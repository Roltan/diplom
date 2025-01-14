<?php

namespace App\Http\Resources\Test;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $correct = json_decode($this->correct);
        $uncorrect = json_decode($this->uncorrect);
        $allAnswers = array_merge($correct, $uncorrect);

        // Преобразуем каждый элемент в нужный формат
        $answers = array_map(function ($answer) use ($correct) {
            return [
                'label' => $answer, // Используем значение из массива как label
                'checked' => in_array($answer, $correct) ? 1 : 0 // Проверяем, есть ли элемент в массиве correct
            ];
        }, $allAnswers);

        return [
            'id' => $this->id,
            'type' => $this->type,
            'quest' => $this->quest,
            'answers' => $answers,
            'is_multiple' => $this->is_multiple
        ];
    }
}
