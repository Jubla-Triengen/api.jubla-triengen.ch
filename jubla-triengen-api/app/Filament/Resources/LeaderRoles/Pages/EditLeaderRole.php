<?php

namespace App\Filament\Resources\LeaderRoles\Pages;

use App\Filament\Resources\LeaderRoles\LeaderRoleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLeaderRole extends EditRecord
{
    protected static string $resource = LeaderRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
