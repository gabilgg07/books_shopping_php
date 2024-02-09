<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


$jsonData = Cache::get('currency_data');
if (!$jsonData) {

    // limitli idi 7 gunluk:
    // $response = Http::get('https://api.fastforex.io/fetch-multi?from=USD&to=EUR,GBP,AZN,RUB,TRY&api_key=68ce4283fe-ed772e671a-s7yiza');

    $response = Http::get('https://api.getgeoapi.com/v2/currency/convert?api_key=ded94445ff094e509bc212c70b80a60ea06541ef&from=USD&');
    $jsonData = $response->json();

    if ($jsonData && isset($jsonData['status']) && $jsonData['status'] === 'success') {
        // Cache the data for a day
        Cache::put('currency_data', $jsonData['rates'], now()->addDay());
    }
}

class CurrencyComposer
{
    public function compose(View $view)
    {
        // $data = Cache::get('currency_data');
        // $hasResult = $data && isset($data['results']);
        // $currencies = $hasResult ? $data['results'] : null;
        // $currency = match (LaravelLocalization::getCurrentLocale()) {
        //     'az' => 'AZN',
        //     'ru' => 'RUB',
        //     'tr' => 'TRY',
        //     default => null
        // };
        // $currPrice = $currencies && $currency ? $currencies[$currency] : 1;
        // $view->with('currPrice', $currPrice);


        $data = Cache::get('currency_data');
        $currencies = $data ? $data : null;
        $currency = match (LaravelLocalization::getCurrentLocale()) {
            'az' => 'AZN',
            'ru' => 'RUB',
            'tr' => 'TRY',
            default => null
        };
        $currPrice = $currencies && $currency ? $currencies[$currency]['rate'] : 1;
        $view->with('currPrice', $currPrice);
    }
}
