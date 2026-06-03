<?php

namespace App\Filament\Resources\Commitments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CommitmentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
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
                    ->label("Einsatzleiter")
                    ->placeholder('-'),
                TextEntry::make('publicity')
                    ->label("Sichtbarkeit")
                    ->formatStateUsing(fn (int $state) => match ($state) {
                        0 => 'Privat',
                        1 => 'Intern',
                        2 => 'Öffentlich',
                        default => $state,
                    }),
                TextEntry::make('thumbnail')
                    ->label("Vorschaubild"),
                TextEntry::make('body')
                    ->label("Beschreibung")
                    ->columnSpanFull()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->label("Erstellt am")
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label("Aktualisiert am")
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}

