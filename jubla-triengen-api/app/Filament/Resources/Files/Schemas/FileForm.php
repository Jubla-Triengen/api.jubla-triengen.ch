<?php

namespace App\Filament\Resources\Files\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('uuid')
                    ->label('UUID')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('file_name')
                    ->required(),
                TextInput::make('slug')
                    ->default(null),
                TextInput::make('path')
                    ->required(),
                Toggle::make('is_public')
                    ->required(),
                TextInput::make('mime_type')
                    ->required(),
                TextInput::make('mime_subtype')
                    ->default(null),
                TextInput::make('size')
                    ->required()
                    ->numeric(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->default(null),
            ]);
    }
}
