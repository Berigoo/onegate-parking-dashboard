<?php

namespace App\Filament\Resources\ActiveEntries\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ActiveEntryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_card_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
