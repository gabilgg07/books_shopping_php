<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    public function index(Request $request)
    {
        $userIp = $request->ip();
        dd($_SERVER);
        $response = Http::get('https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_uZSVK17pzXlRI1OzZU0G65gftYpEGjBJKOrD7pfg');

        $jsonData = $response->json();

        dd($jsonData);
    }
}
