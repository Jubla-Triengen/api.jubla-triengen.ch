<?php

namespace App\Filament\Resources\LeaderRoles;

use App\Filament\Resources\LeaderRoles\Pages\CreateLeaderRole;
use App\Filament\Resources\LeaderRoles\Pages\EditLeaderRole;
use App\Filament\Resources\LeaderRoles\Pages\ListLeaderRoles;
use App\Filament\Resources\LeaderRoles\Schemas\LeaderRoleForm;
use App\Filament\Resources\LeaderRoles\Tables\LeaderRolesTable;
use App\Models\LeaderRole;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LeaderRoleResource extends Resource
{
    protected static ?string $model = LeaderRole::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return LeaderRoleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LeaderRolesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLeaderRoles::route('/'),
            'create' => CreateLeaderRole::route('/create'),
            'edit' => EditLeaderRole::route('/{record}/edit'),
        ];
    }
}
