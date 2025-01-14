<?php

namespace App\Http\Resources\Test;

use App\Models\BlankQuest;
use App\Models\ChoiceQuest;
use App\Models\FillQuest;
use App\Models\QuestsTest;
use App\Models\RelationQuest;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class TestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $quest = [];
        foreach ($this->quest as $q) {
            $quest[] = $this->getQuest($q);
        }
        $quest = collect($quest)->shuffle();
        return [
            'id' => $this->id,
            'title' => $this->title,
            'quest' => new QuestResource($quest)
        ];
    }

    protected function getQuest(QuestsTest $questsTest): BlankQuest|FillQuest|RelationQuest|ChoiceQuest
    {
        $quest = $questsTest->quest;

        $quest->type = $questsTest->type_quest;
        $quest->id = $questsTest->id;
        return $quest;
    }
}
