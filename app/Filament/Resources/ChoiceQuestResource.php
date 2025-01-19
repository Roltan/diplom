<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChoiceQuestResource\Pages;
use App\Filament\Resources\ChoiceQuestResource\RelationManagers;
use App\Models\ChoiceQuest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Topic;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;

class ChoiceQuestResource extends Resource
{
    protected static ?string $model = ChoiceQuest::class;

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
                                    ->required(),
                                Textarea::make('quest')
                                    ->label('Задание')
                                    ->required()
                                    ->rows(3),
                                Toggle::make('vis')
                                    ->label('Видимость')
                                    ->default(true),
                            ]),
                        Tab::make('Ответы')
                            ->columns(2)
                            ->schema([
                                Repeater::make('correct')
                                    ->label('Правильные ответы')
                                    ->schema([
                                        TextInput::make('answer')
                                            ->label('Ответ')
                                            ->required(),
                                    ])
                                    ->columns(1)
                                    ->required(),
                                Repeater::make('uncorrect')
                                    ->label('Неправильные ответы')
                                    ->schema([
                                        TextInput::make('answer')
                                            ->label('Ответ')
                                            ->required(),
                                    ])
                                    ->columns(1)
                                    ->required(),
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
                    ->label('Видимость'),
                TextColumn::make('topic.topic')
                    ->label('Тема'),
                TextColumn::make('quest')
                    ->label('Задание')
                    ->searchable()
                    ->limit(50),
                BooleanColumn::make('is_multiple')
                    ->label('Несколько ответов'),
            ])
            ->filters([
                TernaryFilter::make('vis')
                    ->label('Видимость'),
                TernaryFilter::make('is_multiple')
                    ->label('Повторяющиеся ответы'),
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
            'index' => Pages\ListChoiceQuests::route('/'),
            'create' => Pages\CreateChoiceQuest::route('/create'),
            'edit' => Pages\EditChoiceQuest::route('/{record}/edit'),
        ];
    }
}
