<?php

namespace App\Filament\Resources\LeaderRoleAssignments\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LeaderRoleAssignmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('leader_id')
                    ->relationship('leader', 'name')
                    ->required(),
                Select::make('leader_role_id')
                    ->relationship('leaderRole', 'id')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
