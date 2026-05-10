<?php

namespace App\Filament\Resources\ActiveEntries\Pages;

use App\Filament\Resources\ActiveEntries\ActiveEntryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateActiveEntry extends CreateRecord
{
    protected static string $resource = ActiveEntryResource::class;
}
