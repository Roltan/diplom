<?php

namespace App\Http\Resources\Test;

use App\Http\Resources\Quest\QuestResource;
use App\Models\BlankQuest;
use App\Models\ChoiceQuest;
use App\Models\FillQuest;
use App\Models\QuestsTest;
use App\Models\RelationQuest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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

        $formattedTime = $this->max_time != null
            ? gmdate('H:i', $this->max_time)
            : null;

        return [
            'id' => $this->id,
            'title' => $this->title,
            'quest' => new QuestResource($quest),
            'only_user' => $this->only_user,
            'max_time' => $formattedTime,
            'is_multi' => $this->is_multi,
            'is_public' => $this->is_public,
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
