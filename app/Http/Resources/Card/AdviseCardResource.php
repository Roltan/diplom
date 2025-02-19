<?php

namespace App\Http\Resources\Card;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdviseCardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'href' => "/test/" . $this->url,
            'span' => [
                'Название теста' => $this->title,
                'Дата создания' => $this->created_at->format('d.m.Y'),
                'Тема' => $this->topic->topic
            ]
        ];
    }
}
