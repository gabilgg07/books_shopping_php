<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class GlobalVariableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $GLOBALS['glob'] = 99;
        $GLOBALS['counter'] = 1;
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
