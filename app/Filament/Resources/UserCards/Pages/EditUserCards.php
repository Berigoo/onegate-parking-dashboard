<?php

namespace App\Filament\Resources\UserCards\Pages;

use App\Filament\Resources\UserCards\UserCardsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUserCards extends EditRecord
{
    protected static string $resource = UserCardsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
