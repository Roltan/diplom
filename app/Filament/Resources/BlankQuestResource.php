<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlankQuestResource\Pages;
use App\Filament\Resources\BlankQuestResource\RelationManagers;
use App\Models\BlankQuest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Topic;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;

class BlankQuestResource extends Resource
{
    protected static ?string $model = BlankQuest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'lg' => 1,
                ])->schema([
                    Tabs::make('Основные')->tabs([
                        Tab::make('Основные')
                            ->columns(2)
                            ->schema([
                                Select::make('topic_id')
                                    ->label('Тема')
                                    ->options(Topic::all()->pluck('topic', 'id'))
                                    ->required()
                                    ->columnSpan(2),
                                Textarea::make('quest')
                                    ->label('Задание')
                                    ->required()
                                    ->columnSpan(2),
                                Toggle::make('vis')
                                    ->label('Активность')
                                    ->columnSpan(2)
                                    ->default(true),
                            ]),
                        Tab::make('Ответы')
                            ->columns(2)
                            ->schema([
                                Repeater::make('correct')
                                    ->label('Правильные ответы')
                                    ->required()
                                    ->schema([
                                        TextInput::make('answer')
                                            ->label('Ответ')
                                            ->required(),
                                    ])
                                    ->columnSpan(2)
                                    ->defaultItems(1),
                            ])
                    ])
                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ToggleColumn::make('vis')
                    ->label('Активность'),
                TextColumn::make('topic.topic')
                    ->label('Тема'),
                TextColumn::make('quest')
                    ->label('Задание')
                    ->limit(50)
                    ->searchable(),
            ])
            ->filters([
                TernaryFilter::make('vis')
                    ->label('Видимость'),
                SelectFilter::make('topic_id')
                    ->multiple()
                    ->options(fn(): array => Topic::query()->pluck('topic', 'id')->all())
                    ->label('Тема'),
            ])
            ->persistFiltersInSession()
            ->filtersApplyAction(
                fn() => Tables\Actions\Action::make('apply')
                    ->button()
                    ->label('применить'),
            )
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlankQuests::route('/'),
            'create' => Pages\CreateBlankQuest::route('/create'),
            'edit' => Pages\EditBlankQuest::route('/{record}/edit'),
        ];
    }

    public static function mutateFormDataBeforeFill(array $data): array
    {
        // Преобразуем JSON-строку обратно в массив
        if (is_string($data['correct'])) {
            $data['correct'] = json_decode($data['correct'], true);
        }

        return $data;
    }
}
