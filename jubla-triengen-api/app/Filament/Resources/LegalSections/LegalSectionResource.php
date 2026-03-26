<?php

namespace App\Filament\Resources\LegalSections;

use App\Filament\Resources\LegalSections\Pages\CreateLegalSection;
use App\Filament\Resources\LegalSections\Pages\EditLegalSection;
use App\Filament\Resources\LegalSections\Pages\ListLegalSections;
use App\Filament\Resources\LegalSections\Schemas\LegalSectionForm;
use App\Filament\Resources\LegalSections\Tables\LegalSectionsTable;
use App\Models\LegalSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LegalSectionResource extends Resource
{
    protected static ?string $model = LegalSection::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return LegalSectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LegalSectionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLegalSections::route('/'),
            'create' => CreateLegalSection::route('/create'),
            'edit' => EditLegalSection::route('/{record}/edit'),
        ];
    }
}
