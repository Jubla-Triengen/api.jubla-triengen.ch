<?php

namespace App\Filament\Resources\PageSetting\Pages;

use App\Filament\Resources\PageSetting\PageSettingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPageSetting extends EditRecord
{
    protected static string $resource = PageSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
