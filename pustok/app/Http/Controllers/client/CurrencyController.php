<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    public function index(Request $request)
    {
        // $response = Http::get('https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_uZSVK17pzXlRI1OzZU0G65gftYpEGjBJKOrD7pfg');
        // $response = Http::get('https://api.fastforex.io/fetch-multi?from=USD&to=EUR,GBP,AZN,RUB,TRY&api_key=68ce4283fe-ed772e671a-s7yiza');
        // $jsonData = $response->json();

        // return $jsonData;

        $jsonData = Cache::remember('currency_data', now()->addDay(), function () {
            // Fetch data from the API if not in the cache
            $response = Http::get('https://api.fastforex.io/fetch-multi?from=USD&to=EUR,GBP,AZN,RUB,TRY&api_key=68ce4283fe-ed772e671a-s7yiza');
            return $response->json();
        });

        return $jsonData;
    }
}
