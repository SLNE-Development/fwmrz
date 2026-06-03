<?php

namespace App\Filament\Resources\Stations\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('slug'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
