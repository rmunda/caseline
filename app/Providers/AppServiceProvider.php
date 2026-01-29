<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Added
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Added [limits the number of char for DB field if nothing is mentioned
        //otherwise if index applied 255*4>1000 bytes limit]
         Schema::defaultStringLength(191);
    }
}
