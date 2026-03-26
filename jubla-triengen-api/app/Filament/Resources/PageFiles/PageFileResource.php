<?php

namespace App\Filament\Resources\PageFiles;

use App\Filament\Resources\PageFiles\Pages\CreatePageFile;
use App\Filament\Resources\PageFiles\Pages\EditPageFile;
use App\Filament\Resources\PageFiles\Pages\ListPageFiles;
use App\Filament\Resources\PageFiles\Schemas\PageFileForm;
use App\Filament\Resources\PageFiles\Tables\PageFilesTable;
use App\Models\PageFile;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PageFileResource extends Resource
{
    protected static ?string $model = PageFile::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PageFileForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PageFilesTable::configure($table);
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
            'index' => ListPageFiles::route('/'),
            'create' => CreatePageFile::route('/create'),
            'edit' => EditPageFile::route('/{record}/edit'),
        ];
    }
}
