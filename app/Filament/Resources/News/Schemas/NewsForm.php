<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class NewsForm
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
                RichEditor::make('body')
                    ->label("Inhalt")
                    ->columnSpanFull()
                    ->nullable(),
                TextInput::make('thumbnail')
                    ->label("Vorschaubild")
                    ->required()
                    ->columnSpanFull(),
                Select::make('user_id')
                    ->label("Autor")
                    ->relationship('author', 'name')
                    ->default(auth()->id())
                    ->searchable()
                    ->preload()
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
            ]);
    }
}

