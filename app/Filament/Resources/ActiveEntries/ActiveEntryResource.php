<?php

namespace App\Filament\Resources\ActiveEntries;

use App\Filament\Resources\ActiveEntries\Pages\CreateActiveEntry;
use App\Filament\Resources\ActiveEntries\Pages\EditActiveEntry;
use App\Filament\Resources\ActiveEntries\Pages\ListActiveEntries;
use App\Filament\Resources\ActiveEntries\Pages\ViewActiveEntry;
use App\Filament\Resources\ActiveEntries\Schemas\ActiveEntryForm;
use App\Filament\Resources\ActiveEntries\Schemas\ActiveEntryInfolist;
use App\Filament\Resources\ActiveEntries\Tables\ActiveEntriesTable;
use App\Models\ActiveEntry;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ActiveEntryResource extends Resource
{
    protected static ?string $model = ActiveEntry::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Current Occupancy';

    protected static ?string $recordTitleAttribute = 'Current Occupancy';

    public static function form(Schema $schema): Schema
    {
        return ActiveEntryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ActiveEntryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ActiveEntriesTable::configure($table);
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
            'index' => ListActiveEntries::route('/'),
            'create' => CreateActiveEntry::route('/create'),
            'view' => ViewActiveEntry::route('/{record}'),
            'edit' => EditActiveEntry::route('/{record}/edit'),
        ];
    }
}
