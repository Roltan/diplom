<?php

namespace App\Filament\Resources\RelationQuestResource\Pages;

use App\Filament\Resources\RelationQuestResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRelationQuest extends CreateRecord
{
    protected static string $resource = RelationQuestResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (isset($data['first_column']) && is_array($data['first_column'])) {
            // Преобразуем массив ["answer" => "dolores"] в ["dolores"]
            $data['first_column'] = json_encode(array_column($data['first_column'], 'answer'));
        }
        if (isset($data['second_column']) && is_array($data['second_column'])) {
            // Преобразуем массив ["answer" => "dolores"] в ["dolores"]
            $data['second_column'] = json_encode(array_column($data['second_column'], 'answer'));
        }

        return $data;
    }
}
