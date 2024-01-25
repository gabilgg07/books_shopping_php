<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HeroSlider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero_sliders = HeroSlider::where('is_deleted', 0)->where('is_active', 1)->get();
        $categories = Category::where('is_deleted', 0)->where('is_active', 1);
        $galery_categoriers = [
            'single' => $categories->whereNotNull('image')->first(),
            'galery' => $categories->whereNotNull('image')->skip(1)->take(4)->get(),
        ];
        $home_index_vm = [
            'hero_sliders' => $hero_sliders,
            'galery_categoriers' => $galery_categoriers,
        ];
        return view("client.home.index", compact('home_index_vm'));
    }
}
