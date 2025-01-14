<?php

namespace App\Filament\Resources\FillQuestResource\Pages;

use App\Filament\Resources\FillQuestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFillQuest extends EditRecord
{
    protected static string $resource = FillQuestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($data['options']) && is_array($data['options'])) {
            // Преобразуем массив [["answer" => ["str" => '123', "correct" => 'true']]] в [["str" => '123', "correct" => 'true']]
            $data['options'] = json_encode(array_map(fn($item) => $item['answer'], $data['options']));
        }

        return $data;
    }

    protected function fillForm(): void
    {
        $data = $this->record->toArray();

        // Преобразуем JSON-строку обратно в массив
        if (is_string($data['options'])) {
            $optionsArray = json_decode($data['options'], true);

            // Проверяем, является ли массив ожидаемого формата
            if (is_array($optionsArray) && !isset($optionsArray[0]['answer'])) {
                $data['options'] = array_map(fn($group) => ['answer' => $group], $optionsArray);
            } else {
                $data['options'] = $optionsArray;
            }
        }

        $this->form->fill($data);
    }
}
