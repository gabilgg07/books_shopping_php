<?php

namespace App\Providers;

use App\View\Composers\CurrencyComposer;
use App\View\Composers\LangComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ...
    }

    public function boot(): void
    {
        Facades\View::composer(['client.layouts.partials.nav', 'client.home.index', 'client.shop.details'], LangComposer::class);

        Facades\View::composer('*', CurrencyComposer::class);
    }
}
