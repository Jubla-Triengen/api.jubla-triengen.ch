<?php

namespace App\Filament\Resources\LeaderCourseAssignments\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LeaderCourseAssignmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('leader_id')
                    ->relationship('leader', 'name')
                    ->required(),
                Select::make('course_id')
                    ->relationship('course', 'id')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
