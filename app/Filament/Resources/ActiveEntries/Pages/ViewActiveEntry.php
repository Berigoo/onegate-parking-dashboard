<?php

namespace App\Filament\Resources\ActiveEntries\Pages;

use App\Filament\Resources\ActiveEntries\ActiveEntryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewActiveEntry extends ViewRecord
{
    protected static string $resource = ActiveEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
