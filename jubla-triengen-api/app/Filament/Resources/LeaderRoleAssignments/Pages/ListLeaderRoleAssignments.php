<?php

namespace App\Filament\Resources\LeaderRoleAssignments\Pages;

use App\Filament\Resources\LeaderRoleAssignments\LeaderRoleAssignmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLeaderRoleAssignments extends ListRecords
{
    protected static string $resource = LeaderRoleAssignmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
