<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Schemas\Schema;

class NewsInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make("Allgemein")
                    ->columns(2)
                    ->schema([
                        TextEntry::make('title')
                            ->label("Titel"),
                        TextEntry::make('slug')
                            ->label("Slug"),
                        TextEntry::make('author.name')
                            ->label("Autor")
                            ->placeholder('-'),
                        TextEntry::make('publicity')
                            ->label("Sichtbarkeit")
                            ->formatStateUsing(fn (int $state) => match ($state) {
                                0 => 'Privat',
                                1 => 'Intern',
                                2 => 'Öffentlich',
                                default => $state,
                            }),
                        IconEntry::make('static')
                            ->label("Statisch")
                            ->boolean(),
                        TextEntry::make('body')
                            ->label("Inhalt")
                            ->columnSpanFull()
                            ->placeholder('-'),
                    ]),

                Section::make("Medien")
                    ->columns(1)
                    ->schema([
                        SpatieMediaLibraryImageEntry::make('thumbnail')
                            ->label("Vorschaubild")
                            ->collection('thumbnail'),
                        SpatieMediaLibraryImageEntry::make('gallery')
                            ->label("Galerie")
                            ->collection('gallery'),
                    ]),

                Section::make("Zeitstempel")
                    ->columns(2)
                    ->schema([
                        TextEntry::make('created_at')
                            ->label("Erstellt am")
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->label("Aktualisiert am")
                            ->dateTime()
                            ->placeholder('-'),
                    ]),
            ]);
    }
}
