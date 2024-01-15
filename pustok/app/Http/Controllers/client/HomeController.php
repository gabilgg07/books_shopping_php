<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero_sliders = HeroSlider::where('is_deleted', 0)->where('is_active', 1)->get();
        $home_index_vm = [
            'hero_sliders' => $hero_sliders
        ];
        return view("client.home.index", compact('home_index_vm'));
    }
}