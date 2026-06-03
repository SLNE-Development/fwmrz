<?php

namespace App\Filament\Resources\Commitments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CommitmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label("Titel")
                    ->required()
                    ->columnSpanFull()
                    ->afterStateUpdated(function (callable $set, ?string $state) {
                        if ($state) {
                            $set('slug', str()->slug($state));
                        }
                    })
                    ->live(),
                TextInput::make('slug')
                    ->label("Slug")
                    ->required()
                    ->columnSpanFull()
                    ->live(),
                DateTimePicker::make('start')
                    ->label("Startzeitpunkt")
                    ->required(),
                Select::make('commitment_type_id')
                    ->label("Einsatzart")
                    ->relationship('type', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),
                Select::make('user_id')
                    ->label("Autor")
                    ->relationship('author', 'name')
                    ->searchable()
                    ->preload()
                    ->default(auth()->id())
                    ->nullable(),
                Select::make('publicity')
                    ->label("Sichtbarkeit")
                    ->options([
                        0 => 'Privat',
                        1 => 'Intern',
                        2 => 'Öffentlich',
                    ])
                    ->default(2)
                    ->required(),
                TextInput::make('thumbnail')
                    ->label("Vorschaubild")
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('body')
                    ->label("Beschreibung")
                    ->columnSpanFull()
                    ->nullable(),
            ]);
    }
}

