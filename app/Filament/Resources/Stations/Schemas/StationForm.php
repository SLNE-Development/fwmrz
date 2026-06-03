<?php

namespace App\Filament\Resources\Stations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label("Name")
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
                    ->columnSpanFull()
                    ->live()
                    ->required(),
            ]);
    }
}
