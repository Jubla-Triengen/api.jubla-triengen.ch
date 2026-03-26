<?php

namespace App\Filament\Resources\LeaderRoleAssignments\Pages;

use App\Filament\Resources\LeaderRoleAssignments\LeaderRoleAssignmentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLeaderRoleAssignment extends EditRecord
{
    protected static string $resource = LeaderRoleAssignmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
