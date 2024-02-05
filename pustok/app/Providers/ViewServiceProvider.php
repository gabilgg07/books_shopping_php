<?php

namespace App\Providers;

use App\View\Composers\CurrencyComposer;
use App\View\Composers\CurrentLangComposer;
use App\View\Composers\LangComposer;
use App\View\Composers\OrdersComposer;
use App\View\Composers\SettingsComposer;
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

        Facades\View::composer('admin.layouts.partials.main_sidebar', OrdersComposer::class);

        Facades\View::composer('*', SettingsComposer::class);

        Facades\View::composer(['client.layouts.partials.menu'], CurrentLangComposer::class);
    }
}
