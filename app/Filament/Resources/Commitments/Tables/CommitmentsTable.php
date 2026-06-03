<?php

namespace App\Filament\Resources\Commitments\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CommitmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('title')
                    ->label("Titel")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('start')
                    ->label("Startzeitpunkt")
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('type.name')
                    ->label("Einsatzart")
                    ->placeholder('-')
                    ->searchable(),
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
                    EditAction::make(),
                    DeleteAction::make()
                ])
            ])
            ->toolbarActions([]);
    }
}

