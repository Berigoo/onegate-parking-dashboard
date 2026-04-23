<?php

namespace App\Filament\Resources\UserCards;

use App\Filament\Resources\UserCards\Pages\CreateUserCards;
use App\Filament\Resources\UserCards\Pages\EditUserCards;
use App\Filament\Resources\UserCards\Pages\ListUserCards;
use App\Filament\Resources\UserCards\Schemas\UserCardsForm;
use App\Filament\Resources\UserCards\Tables\UserCardsTable;
use App\Models\UserCards;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UserCardsResource extends Resource
{
    protected static ?string $model = UserCards::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'User Cards';

    public static function form(Schema $schema): Schema
    {
        return UserCardsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UserCardsTable::configure($table);
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
            'index' => ListUserCards::route('/'),
            'create' => CreateUserCards::route('/create'),
            'edit' => EditUserCards::route('/{record}/edit'),
        ];
    }
}
