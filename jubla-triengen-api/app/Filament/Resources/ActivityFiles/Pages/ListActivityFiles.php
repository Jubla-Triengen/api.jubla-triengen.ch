<?php

namespace App\Filament\Resources\ActivityFiles\Pages;

use App\Filament\Resources\ActivityFiles\ActivityFileResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListActivityFiles extends ListRecords
{
    protected static string $resource = ActivityFileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
