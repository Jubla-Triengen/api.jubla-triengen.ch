<?php

namespace App\Filament\Resources\LegalSections\Pages;

use App\Filament\Resources\LegalSections\LegalSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLegalSections extends ListRecords
{
    protected static string $resource = LegalSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
