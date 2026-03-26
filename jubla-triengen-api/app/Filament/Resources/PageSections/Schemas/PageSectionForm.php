<?php

namespace App\Filament\Resources\PageSections\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PageSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('page_id')
                    ->relationship('page', 'title')
                    ->required(),
                TextInput::make('title')
                    ->default(null),
                Textarea::make('paragraph')
                    ->default(null)
                    ->columnSpanFull(),
                Select::make('image_id')
                    ->relationship('image', 'id')
                    ->default(null),
                TextInput::make('button_label')
                    ->default(null),
                TextInput::make('button_link')
                    ->default(null),
                TextInput::make('orientation')
                    ->default(null),
                TextInput::make('background_color')
                    ->default(null),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
