<?php

namespace App\Filament\Resources\RelationQuestResource\Pages;

use App\Filament\Resources\RelationQuestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRelationQuests extends ListRecords
{
    protected static string $resource = RelationQuestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
