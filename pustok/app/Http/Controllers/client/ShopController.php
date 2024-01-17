<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index($slug = null)
    {
        return view("client.shop.index");
    }
    public function details($id = 0)
    {
        return view("client.shop.details");
    }
    public function card()
    {
        return view("client.shop.card");
    }
    public function wishlist()
    {
        return view("client.shop.wishlist");
    }
}