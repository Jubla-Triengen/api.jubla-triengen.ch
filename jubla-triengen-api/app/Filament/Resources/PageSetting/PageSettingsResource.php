<?php

namespace App\Filament\Resources\PageSetting;

use App\Filament\Resources\PageSetting\Pages\CreatePageSetting;
use App\Filament\Resources\PageSetting\Pages\EditPageSetting;
use App\Filament\Resources\PageSetting\Pages\ListPageSetting;
use App\Filament\Resources\PageSetting\Schemas\PageSettingForm;
use App\Filament\Resources\PageSetting\Tables\PageSettingTable;
use App\Models\PageSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PageSettingResource extends Resource
{
    protected static ?string $model = PageSetting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'key';

    public static function form(Schema $schema): Schema
    {
        return PageSettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PageSettingTable::configure($table);
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
            'index' => ListPageSetting::route('/'),
            'create' => CreatePageSetting::route('/create'),
            'edit' => EditPageSetting::route('/{record}/edit'),
        ];
    }
}
