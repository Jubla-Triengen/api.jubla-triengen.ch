<?php

namespace App\Filament\Resources\LeaderRoleAssignments;

use App\Filament\Resources\LeaderRoleAssignments\Pages\CreateLeaderRoleAssignment;
use App\Filament\Resources\LeaderRoleAssignments\Pages\EditLeaderRoleAssignment;
use App\Filament\Resources\LeaderRoleAssignments\Pages\ListLeaderRoleAssignments;
use App\Filament\Resources\LeaderRoleAssignments\Schemas\LeaderRoleAssignmentForm;
use App\Filament\Resources\LeaderRoleAssignments\Tables\LeaderRoleAssignmentsTable;
use App\Models\LeaderRoleAssignment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LeaderRoleAssignmentResource extends Resource
{
    protected static ?string $model = LeaderRoleAssignment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return LeaderRoleAssignmentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LeaderRoleAssignmentsTable::configure($table);
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
            'index' => ListLeaderRoleAssignments::route('/'),
            'create' => CreateLeaderRoleAssignment::route('/create'),
            'edit' => EditLeaderRoleAssignment::route('/{record}/edit'),
        ];
    }
}
