<?php

namespace App\Filament\Resources\UserCards\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserCardsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('uid')
                    ->label("UID Kartu")
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('uid', preg_replace('/\s+/', '', $state));
                    })
                    ->dehydrateStateUsing(function ($state) {
                        return preg_replace('/\s+/', '', $state);
                    }),
                TextInput::make('nama')
                    ->required(),
            ]);
    }
}
