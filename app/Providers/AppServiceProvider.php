<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        FilamentAsset::register([
            JS::make('socketio-cdn', 'https://cdn.socket.io/4.7.2/socket.io.min.js'),
            JS::make('card-scanner', 'resources/js/card-scanner.js')
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
    }
}


