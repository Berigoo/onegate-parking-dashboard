<?php

namespace App\Filament\Resources\UserCards\Schemas;

use Exception;
use Filament\Forms\Components\TextInput;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Http;

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
                    })
                    ->suffixAction(
                        Action::make('scanCard')
                            ->icon('heroicon-m-credit-card')
                            ->tooltip('Scan kartu')
                            ->action(function ($livewire) {
                                try {
                                    $response = Http::post('http://127.0.0.1:8080/register/start');
                                    if ($response->failed()) {
                                        Notification::make()
                                            ->title('Register Failed')
                                            ->body('Server returned error: ' . $response->status())
                                            ->danger()
                                            ->send();
                                        return;
                                    }
                                    
                                    $sessionId = $response['session_id'];
                                    if (!$sessionId) {
                                        Notification::make()
                                            ->title('Register Failed')
                                            ->body('Invalid respond from server')
                                            ->danger()
                                            ->send();
                                        return;
                                    }

                                    Notification::make()
                                        ->title('Ready to Scan')
                                        ->body('Tap your card now through IN card reader now...')
                                        ->success()
                                        ->send();
                                    $livewire->dispatch('register-started', sessionId: $sessionId);
                                    
                                } catch(\Throwable $e){
                                    Notification::make()
                                        ->title('Connection Error')
                                        ->body('Failed reach parking system')
                                        ->danger()
                                        ->send();
                                }
                            })
                    ),
                TextInput::make('nama')
                    ->required(),
            ]);
    }
}
