<?php

namespace App\Filament\Resources\ChoiceQuestResource\Pages;

use App\Filament\Resources\ChoiceQuestResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateChoiceQuest extends CreateRecord
{
    protected static string $resource = ChoiceQuestResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (isset($data['correct']) && is_array($data['correct'])) {
            // Преобразуем массив ["answer" => "dolores"] в ["dolores"]
            $data['correct'] = json_encode(array_column($data['correct'], 'answer'));
        }
        if (isset($data['uncorrect']) && is_array($data['uncorrect'])) {
            // Преобразуем массив ["answer" => "dolores"] в ["dolores"]
            $data['uncorrect'] = json_encode(array_column($data['uncorrect'], 'answer'));
        }

        return $data;
    }
}
