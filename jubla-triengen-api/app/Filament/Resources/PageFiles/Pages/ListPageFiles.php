<?php

namespace App\Filament\Resources\PageFiles\Pages;

use App\Filament\Resources\PageFiles\PageFileResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPageFiles extends ListRecords
{
    protected static string $resource = PageFileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
