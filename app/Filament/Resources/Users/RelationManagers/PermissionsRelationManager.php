<?php

namespace App\Filament\Resources\Users\RelationManagers;

use Filament\Actions\ActionGroup;
use Filament\Actions\AttachAction;
use Filament\Actions\DetachAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PermissionsRelationManager extends RelationManager
{
    protected static string $relationship = 'permissions';

    protected static ?string $title = 'Direkte Berechtigungen';
    protected static ?string $label = 'Berechtigung';
    protected static ?string $pluralLabel = 'Berechtigungen';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Berechtigung')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('guard_name')
                    ->label('Guard')
                    ->badge()
                    ->color('gray'),
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
                    ->label('Berechtigung zuweisen')
                    ->preloadRecordSelect()
                    ->recordTitle(fn($record) => $record->name),
            ])
            ->emptyStateHeading('Keine direkten Berechtigungen')
            ->emptyStateDescription('Berechtigungen werden in der Regel über Rollen vergeben.');
    }
}

