<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ShoppingCart extends Controller
{
    public function add($id)
    {
        // Cart::destroy();
        Cart::add(['id' => '1', 'name' => 'Product 2', 'qty' => 1, 'price' => 19.99, 'weight' => 550, 'options' => ['size' => 'large', 'image' => 'client/assets/image/products/product-2.jpg']]);

        return redirect()->back();
    }

    public function destroy()
    {
        Cart::destroy();
        return redirect()->back();
    }
    public function remove($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }
}
