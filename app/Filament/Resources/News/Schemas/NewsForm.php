<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
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
                    ->columnSpanFull(),
                RichEditor::make('body')
                    ->label("Inhalt")
                    ->extraAttributes(['style' => 'min-height: 300px;'])
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'bold', 'italic', 'underline', 'strike',
                        'h2', 'h3',
                        'bulletList', 'orderedList',
                        'blockquote',
                        'link',
                        'undo', 'redo',
                    ])
                    ->nullable(),
                Select::make('user_id')
                    ->label("Autor")
                    ->relationship('author', 'name')
                    ->preload()
                    ->default(auth()->id())
                    ->searchable()
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
                SpatieMediaLibraryFileUpload::make('thumbnail')
                    ->label("Vorschaubild")
                    ->collection('thumbnail')
                    ->image()
                    ->imageEditor()
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('gallery')
                    ->label("Galerie")
                    ->collection('gallery')
                    ->image()
                    ->imageEditor()
                    ->multiple()
                    ->reorderable()
                    ->columnSpanFull(),
            ]);
    }
}
