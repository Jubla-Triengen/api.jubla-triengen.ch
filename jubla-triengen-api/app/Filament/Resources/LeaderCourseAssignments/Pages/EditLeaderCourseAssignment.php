<?php

namespace App\Filament\Resources\LeaderCourseAssignments\Pages;

use App\Filament\Resources\LeaderCourseAssignments\LeaderCourseAssignmentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLeaderCourseAssignment extends EditRecord
{
    protected static string $resource = LeaderCourseAssignmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
