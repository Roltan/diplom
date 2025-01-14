<?php

namespace App\Filament\Resources\BlankQuestResource\Pages;

use App\Filament\Resources\BlankQuestResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlankQuest extends CreateRecord
{
    protected static string $resource = BlankQuestResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (isset($data['correct']) && is_array($data['correct'])) {
            // Преобразуем массив ["answer" => "dolores"] в ["dolores"]
            $data['correct'] = json_encode(array_column($data['correct'], 'answer'));
        }

        return $data;
    }
}
