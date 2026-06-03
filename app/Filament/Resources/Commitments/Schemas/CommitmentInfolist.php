<?php

namespace App\Filament\Resources\Commitments\Schemas;

use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CommitmentInfolist
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
                        TextEntry::make('start')
                            ->label("Startzeitpunkt")
                            ->dateTime(),
                        TextEntry::make('type.name')
                            ->label("Einsatzart")
                            ->placeholder('-'),
                        TextEntry::make('author.name')
                            ->label("Autor")
                            ->placeholder('-'),
                        TextEntry::make('publicity')
                            ->label("Sichtbarkeit")
                            ->formatStateUsing(fn(int $state) => match ($state) {
                                0 => 'Privat',
                                1 => 'Intern',
                                2 => 'Öffentlich',
                                default => $state,
                            }),
                        TextEntry::make('body')
                            ->label("Beschreibung")
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
