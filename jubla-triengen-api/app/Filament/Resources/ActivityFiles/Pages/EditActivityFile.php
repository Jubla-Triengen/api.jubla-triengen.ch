<?php

namespace App\Filament\Resources\ActivityFiles\Pages;

use App\Filament\Resources\ActivityFiles\ActivityFileResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditActivityFile extends EditRecord
{
    protected static string $resource = ActivityFileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
