<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FillQuestResource\Pages;
use App\Filament\Resources\FillQuestResource\RelationManagers;
use App\Models\FillQuest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
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
use App\Rules\HasCorrectAnswer;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;

class FillQuestResource extends Resource
{
    protected static ?string $model = FillQuest::class;

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
                                Repeater::make('options')
                                    ->label('Список ответов')
                                    ->schema([
                                        Repeater::make('answer')
                                            ->label('Ответы')
                                            ->schema([
                                                TextInput::make('str')
                                                    ->label('Вариант')
                                                    ->required(),
                                                Toggle::make('correct')
                                                    ->label('Правильный')
                                                    ->default(false),
                                            ])
                                            ->columnSpan(1)
                                            ->required(),
                                    ])
                                    ->columnSpan(2)
                                    ->required()
                                    ->rules([new HasCorrectAnswer])
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
            'index' => Pages\ListFillQuests::route('/'),
            'create' => Pages\CreateFillQuest::route('/create'),
            'edit' => Pages\EditFillQuest::route('/{record}/edit'),
        ];
    }
}
