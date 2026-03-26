<?php

namespace App\Filament\Resources\ActivityFiles;

use App\Filament\Resources\ActivityFiles\Pages\CreateActivityFile;
use App\Filament\Resources\ActivityFiles\Pages\EditActivityFile;
use App\Filament\Resources\ActivityFiles\Pages\ListActivityFiles;
use App\Filament\Resources\ActivityFiles\Schemas\ActivityFileForm;
use App\Filament\Resources\ActivityFiles\Tables\ActivityFilesTable;
use App\Models\ActivityFile;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ActivityFileResource extends Resource
{
    protected static ?string $model = ActivityFile::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'activity_id';

    public static function form(Schema $schema): Schema
    {
        return ActivityFileForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ActivityFilesTable::configure($table);
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
            'index' => ListActivityFiles::route('/'),
            'create' => CreateActivityFile::route('/create'),
            'edit' => EditActivityFile::route('/{record}/edit'),
        ];
    }
}
