<?php

namespace App\Filament\Resources\Leaders\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LeaderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('slug')
                    ->default(null),
                TextInput::make('name')
                    ->required(),
                TextInput::make('nickname')
                    ->default(null),
                TextInput::make('role')
                    ->default(null),
                Select::make('image_id')
                    ->relationship('image', 'id')
                    ->default(null),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('long_description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),
                DatePicker::make('birth_date'),
                TextInput::make('profession')
                    ->default(null),
                Textarea::make('hobbies')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('jubla_highlight')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
