<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('slug')
                    ->required(),
                TextInput::make('title')
                    ->default(null),
                Textarea::make('subtitle')
                    ->default(null)
                    ->columnSpanFull(),
                Select::make('hero_image_id')
                    ->relationship('heroImage', 'id')
                    ->default(null),
                TextInput::make('hero_title')
                    ->default(null),
                Textarea::make('hero_subtitle')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
