<?php

namespace App\Filament\Resources\FillQuestResource\Pages;

use App\Filament\Resources\FillQuestResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFillQuest extends CreateRecord
{
    protected static string $resource = FillQuestResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (isset($data['options']) && is_array($data['options'])) {
            // Преобразуем массив [["answer" => ["str" => '123', "correct" => 'true']]] в [["str" => '123', "correct" => 'true']]
            $data['options'] = json_encode(array_map(fn($item) => $item['answer'], $data['options']));
        }

        return $data;
    }
}
