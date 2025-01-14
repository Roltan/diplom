<?php

namespace App\Filament\Resources\ChoiceQuestResource\Pages;

use App\Filament\Resources\ChoiceQuestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChoiceQuest extends EditRecord
{
    protected static string $resource = ChoiceQuestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
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

    protected function fillForm(): void
    {
        $data = $this->record->toArray();

        // Преобразуем JSON-строку обратно в массив
        if (is_string($data['correct'])) {
            $correctArray = json_decode($data['correct'], true);

            // Проверяем, является ли массив ожидаемого формата
            if (is_array($correctArray) && !isset($correctArray[0]['answer'])) {
                $data['correct'] = array_map(fn($answer) => ['answer' => $answer], $correctArray);
            } else {
                $data['correct'] = $correctArray;
            }
        }
        if (is_string($data['uncorrect'])) {
            $correctArray = json_decode($data['uncorrect'], true);

            // Проверяем, является ли массив ожидаемого формата
            if (is_array($correctArray) && !isset($correctArray[0]['answer'])) {
                $data['uncorrect'] = array_map(fn($answer) => ['answer' => $answer], $correctArray);
            } else {
                $data['uncorrect'] = $correctArray;
            }
        }

        $this->form->fill($data);
    }
}
