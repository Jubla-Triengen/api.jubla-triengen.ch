<?php

namespace App\Filament\Resources\PageSetting\Pages;

use App\Filament\Resources\PageSetting\PageSettingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPageSetting extends ListRecords
{
    protected static string $resource = PageSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
