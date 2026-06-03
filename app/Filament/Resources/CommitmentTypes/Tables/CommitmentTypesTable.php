<?php

namespace App\Filament\Resources\CommitmentTypes\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CommitmentTypesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('short')
                    ->label("Kürzel")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name')
                    ->label("Name")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('aaoName')
                    ->label("AAO-Bezeichnung")
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label("Erstellt am")
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                ])
            ])
            ->toolbarActions([]);
    }
}

