<?php

namespace App\Filament\Resources\PageFiles\Pages;

use App\Filament\Resources\PageFiles\PageFileResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPageFile extends EditRecord
{
    protected static string $resource = PageFileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
