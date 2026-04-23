<?php

namespace App\Filament\Resources\UserCards\Pages;

use App\Filament\Resources\UserCards\UserCardsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUserCards extends CreateRecord
{
    protected static string $resource = UserCardsResource::class;
}
