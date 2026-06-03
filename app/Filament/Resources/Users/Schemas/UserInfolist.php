<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('Zugangsdaten')
                ->columns(2)
                ->schema([
                    TextEntry::make('name')
                        ->label('Name'),

                    TextEntry::make('email')
                        ->label('E-Mail-Adresse'),

                    TextEntry::make('email_verified_at')
                        ->label('E-Mail verifiziert')
                        ->dateTime('d.m.Y H:i')
                        ->placeholder('Nicht verifiziert'),

                    TextEntry::make('created_at')
                        ->label('Erstellt am')
                        ->dateTime('d.m.Y H:i'),
                ]),

            Section::make('Rollen')
                ->schema([
                    TextEntry::make('roles.name')
                        ->label('Zugewiesene Rollen')
                        ->badge()
                        ->color('warning')
                        ->placeholder('Keine Rollen zugewiesen'),
                ]),

            Section::make('Direkte Berechtigungen')
                ->schema([
                    TextEntry::make('permissions.name')
                        ->label('Direkte Berechtigungen')
                        ->badge()
                        ->color('info')
                        ->placeholder('Keine direkten Berechtigungen'),
                ]),
        ]);
    }
}

