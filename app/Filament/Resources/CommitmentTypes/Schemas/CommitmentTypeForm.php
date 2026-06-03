<?php

namespace App\Filament\Resources\CommitmentTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CommitmentTypeForm
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
                    ->required()
                    ->columnSpanFull()
                    ->live(),
                TextInput::make('short')
                    ->label("Kürzel")
                    ->required(),
                TextInput::make('aaoName')
                    ->label("AAO-Bezeichnung")
                    ->required(),
            ]);
    }
}

