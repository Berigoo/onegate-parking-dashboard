<?php

namespace App\Filament\Resources\UserCards\Pages;

use App\Filament\Resources\UserCards\UserCardsResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateUserCards extends CreateRecord
{
    protected static string $resource = UserCardsResource::class;

    protected function getListeners()
    {
        return [
            'card-read-success' => 'handleCardReadSuccess',
        ];
    }

    public function handleCardReadSuccess(string $uid): void
    {
        if ($uid == -1) {
            Notification::make()
                ->title('Card read timer expired')
                ->body('Please request for card read again...')
                ->danger()
                ->send();
            return;
        }
        
        Notification::make()
            ->title('Card read success')
            ->body('Card UID: ' . $uid)
            ->success()
            ->send();

        $this->form->fill([
        'uid' => $uid,
        ]);
    }
}
