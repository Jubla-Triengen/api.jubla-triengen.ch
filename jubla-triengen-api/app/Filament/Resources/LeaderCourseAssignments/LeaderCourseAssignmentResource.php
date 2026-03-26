<?php

namespace App\Filament\Resources\LeaderCourseAssignments;

use App\Filament\Resources\LeaderCourseAssignments\Pages\CreateLeaderCourseAssignment;
use App\Filament\Resources\LeaderCourseAssignments\Pages\EditLeaderCourseAssignment;
use App\Filament\Resources\LeaderCourseAssignments\Pages\ListLeaderCourseAssignments;
use App\Filament\Resources\LeaderCourseAssignments\Schemas\LeaderCourseAssignmentForm;
use App\Filament\Resources\LeaderCourseAssignments\Tables\LeaderCourseAssignmentsTable;
use App\Models\LeaderCourseAssignment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LeaderCourseAssignmentResource extends Resource
{
    protected static ?string $model = LeaderCourseAssignment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return LeaderCourseAssignmentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LeaderCourseAssignmentsTable::configure($table);
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
            'index' => ListLeaderCourseAssignments::route('/'),
            'create' => CreateLeaderCourseAssignment::route('/create'),
            'edit' => EditLeaderCourseAssignment::route('/{record}/edit'),
        ];
    }
}
