<?php

namespace App\Filament\Resources\Commitments\RelationManagers;

use Filament\Actions\ActionGroup;
use Filament\Actions\AttachAction;
use Filament\Actions\DetachAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StationsRelationManager extends RelationManager
{
    protected static string $relationship = 'stations';

    protected static ?string $title = 'Kräfte';
    protected static ?string $label = 'Kraft';
    protected static ?string $pluralLabel = "Kräfte";

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label("Name")
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->label("Slug")
                    ->searchable(),
            ])
            ->filters([])
            ->recordActions([
                ActionGroup::make([
                    DetachAction::make(),
                ])
            ])
            ->headerActions([
                AttachAction::make()
                    ->preloadRecordSelect()
                    ->recordTitle(fn($record) => $record->name),
            ]);
    }
}

