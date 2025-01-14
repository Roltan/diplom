<?php

namespace App\Http\Resources\Test;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'quest' => $this->quest,
            'options' => json_decode($this->options),
        ];
    }
}
