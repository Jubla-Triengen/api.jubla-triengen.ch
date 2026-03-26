<?php

namespace App\Filament\Resources\LeaderRoles\Pages;

use App\Filament\Resources\LeaderRoles\LeaderRoleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLeaderRoles extends ListRecords
{
    protected static string $resource = LeaderRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
