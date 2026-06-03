<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('Zugangsdaten')
                ->columns(2)
                ->schema([
                    TextInput::make('name')
                        ->label('Name')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('email')
                        ->label('E-Mail-Adresse')
                        ->email()
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255),

                    TextInput::make('password')
                        ->label('Passwort')
                        ->password()
                        ->revealable()
                        ->minLength(8)
                        ->dehydrateStateUsing(fn($state) => filled($state) ? bcrypt($state) : null)
                        ->dehydrated(fn($state) => filled($state))
                        ->required(fn(string $operation) => $operation === 'create')
                        ->helperText('Beim Bearbeiten nur ausfüllen, wenn das Passwort geändert werden soll.')
                        ->columnSpanFull(),
                ]),

            Section::make('Rollen & Berechtigungen')
                ->columns(1)
                ->schema([
                    Select::make('roles')
                        ->label('Rollen')
                        ->relationship('roles', 'name')
                        ->multiple()
                        ->preload()
                        ->searchable(),

                    Select::make('permissions')
                        ->label('Direkte Berechtigungen')
                        ->relationship('permissions', 'name')
                        ->multiple()
                        ->preload()
                        ->searchable()
                        ->helperText('Zusätzliche Berechtigungen über die zugewiesenen Rollen hinaus.'),
                ]),
        ]);
    }
}

