<?php

namespace App\Filament\Resources\ActiveEntries\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ActiveEntryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('n-th')
                    ->numeric(),
                TextEntry::make('userCard.nama')
                    ->label('Name'),
                TextEntry::make('created_at')
                    ->label('Check In')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
