<?php

namespace App\Filament\Resources\ActiveEntries\Pages;

use App\Filament\Resources\ActiveEntries\ActiveEntryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListActiveEntries extends ListRecords
{
    protected static string $resource = ActiveEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
