<?php

namespace App\Filament\Resources\BlankQuestResource\Pages;

use App\Filament\Resources\BlankQuestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlankQuests extends ListRecords
{
    protected static string $resource = BlankQuestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
