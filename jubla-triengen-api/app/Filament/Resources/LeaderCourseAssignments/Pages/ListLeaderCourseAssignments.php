<?php

namespace App\Filament\Resources\LeaderCourseAssignments\Pages;

use App\Filament\Resources\LeaderCourseAssignments\LeaderCourseAssignmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLeaderCourseAssignments extends ListRecords
{
    protected static string $resource = LeaderCourseAssignmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
