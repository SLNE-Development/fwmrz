<?php

namespace App\Filament\Resources\CommitmentTypes\RelationManagers;

use Filament\Actions\ActionGroup;
use Filament\Actions\ViewAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CommitmentsRelationManager extends RelationManager
{
    protected static string $relationship = 'commitments';

    protected static ?string $title = 'Einsätze';
    protected static ?string $label = "Einsatz";
    protected static ?string $pluralLabel = "Einsätze";

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label("Titel")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('start')
                    ->label("Startzeitpunkt")
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('author.name')
                    ->label("Autor")
                    ->placeholder('-')
                    ->searchable(),
                TextColumn::make('publicity')
                    ->label("Sichtbarkeit")
                    ->formatStateUsing(fn(int $state) => match ($state) {
                        0 => 'Privat',
                        1 => 'Intern',
                        2 => 'Öffentlich',
                        default => $state,
                    })
                    ->sortable(),
            ])
            ->filters([])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                ])
            ])
            ->toolbarActions([]);
    }
}

