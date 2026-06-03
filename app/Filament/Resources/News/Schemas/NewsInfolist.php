<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class NewsInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title')
                    ->label("Titel"),
                TextEntry::make('slug')
                    ->label("Slug"),
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
                TextEntry::make('thumbnail')
                    ->label("Vorschaubild"),
                TextEntry::make('body')
                    ->label("Inhalt")
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

