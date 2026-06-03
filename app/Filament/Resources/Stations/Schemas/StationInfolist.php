<?php

namespace App\Filament\Resources\Stations\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make("Allgemein")
                    ->columns(2)
                    ->schema([
                        TextEntry::make('name')
                            ->label("Name"),
                        TextEntry::make('slug')
                            ->label("Slug"),
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
