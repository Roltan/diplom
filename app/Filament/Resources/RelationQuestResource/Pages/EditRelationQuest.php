<?php

namespace App\Filament\Resources\RelationQuestResource\Pages;

use App\Filament\Resources\RelationQuestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRelationQuest extends EditRecord
{
    protected static string $resource = RelationQuestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
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

    protected function fillForm(): void
    {
        $data = $this->record->toArray();

        // Преобразуем JSON-строку обратно в массив
        if (is_string($data['first_column'])) {
            $correctArray = json_decode($data['first_column'], true);

            // Проверяем, является ли массив ожидаемого формата
            if (is_array($correctArray) && !isset($correctArray[0]['answer'])) {
                $data['first_column'] = array_map(fn($answer) => ['answer' => $answer], $correctArray);
            } else {
                $data['first_column'] = $correctArray;
            }
        }
        if (is_string($data['second_column'])) {
            $correctArray = json_decode($data['second_column'], true);

            // Проверяем, является ли массив ожидаемого формата
            if (is_array($correctArray) && !isset($correctArray[0]['answer'])) {
                $data['second_column'] = array_map(fn($answer) => ['answer' => $answer], $correctArray);
            } else {
                $data['second_column'] = $correctArray;
            }
        }

        $this->form->fill($data);
    }
}
