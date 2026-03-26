<?php

namespace App\Filament\Resources\Images\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('file_id')
                    ->relationship('file', 'name')
                    ->required(),
                Select::make('gallery_id')
                    ->relationship('gallery', 'name')
                    ->default(null),
                TextInput::make('height')
                    ->numeric()
                    ->default(null),
                TextInput::make('width')
                    ->numeric()
                    ->default(null),
                TextInput::make('alt_text')
                    ->default(null),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
