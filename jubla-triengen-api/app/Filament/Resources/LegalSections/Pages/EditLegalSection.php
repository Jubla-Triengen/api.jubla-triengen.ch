<?php

namespace App\Filament\Resources\LegalSections\Pages;

use App\Filament\Resources\LegalSections\LegalSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLegalSection extends EditRecord
{
    protected static string $resource = LegalSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
