<?php

namespace App\Filament\Resources\CommitmentTypes\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
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

