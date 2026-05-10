<?php

namespace App\Filament\Resources\ActiveEntries\Pages;

use App\Filament\Resources\ActiveEntries\ActiveEntryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditActiveEntry extends EditRecord
{
    protected static string $resource = ActiveEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
