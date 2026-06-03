<?php

namespace App\Filament\Resources\Users\RelationManagers;

use Filament\Actions\ActionGroup;
use Filament\Actions\AttachAction;
use Filament\Actions\DetachAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RolesRelationManager extends RelationManager
{
    protected static string $relationship = 'roles';

    protected static ?string $title = 'Rollen';
    protected static ?string $label = 'Rolle';
    protected static ?string $pluralLabel = 'Rollen';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Rolle')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('guard_name')
                    ->label('Guard')
                    ->badge()
                    ->color('gray'),

                TextColumn::make('permissions_count')
                    ->label('Berechtigungen')
                    ->counts('permissions')
                    ->sortable(),
            ])
            ->filters([])
            ->recordActions([
                ActionGroup::make([
                    DetachAction::make()
                        ->label('Entfernen'),
                ]),
            ])
            ->headerActions([
                AttachAction::make()
                    ->label('Rolle zuweisen')
                    ->preloadRecordSelect()
                    ->recordTitle(fn($record) => $record->name),
            ]);
    }
}

