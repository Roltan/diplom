<?php

namespace App\Http\Resources\Test;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = $this->map(function ($question) {
            switch ($question->type) {
                case 'fill':
                    return new FillResource($question);
                case 'blank':
                    return new BlankResource($question);
                case 'choice':
                    return new ChoiceResource($question);
                case 'relation':
                    return new RelationResource($question);
                default:
                    dd($this->type);
            }
        })->filter()->values();

        $data = json_encode($data);
        $data = json_decode($data, true);

        return $data;
    }
}
