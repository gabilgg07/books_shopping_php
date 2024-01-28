<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CurrencyComposer
{
    public function compose(View $view)
    {
        $data = Cache::get('currency_data');
        $currencies = $data ? $data['results'] : null;
        $currency = match (LaravelLocalization::getCurrentLocale()) {
            'az' => 'AZN',
            'ru' => 'RUB',
            'tr' => 'TRY',
            default => null
        };
        $currPrice = $currencies && $currency ? $currencies[$currency] : 1;
        $view->with('currPrice', $currPrice);
    }
}
