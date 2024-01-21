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



    // public function index($id = null)
    // {
    //     if (auth()->user()) {
    //         $wishlist = auth()->user()->wishlist;

    //         $products = [];

    //         if ($wishlist && count($wishlist) > 0) {
    //             if ($id !== null) {
    //                 $addedProduct = $wishlist->where('product_id', $id)->first();
    //                 if (!$addedProduct) {
    //                     $data = [
    //                         'product_id' => $id,
    //                         'user_id' => auth()->user()->id,
    //                     ];

    //                     $created = WishItem::create($data);

    //                     if (!$created) {
    //                         return redirect()->back()->with('error', 'Failed to add product to wishlist');
    //                     }

    //                     $wishlist->add($created);
    //                 } else {
    //                     return redirect()->back()->with('error', 'Product is already in wishlist');
    //                 }
    //             }

    //             foreach ($wishlist as $key => $wishitem) {
    //                 $products[] = AdminProducts::findOrFail($wishitem->product_id);
    //             }
    //         }

    //         return view('front.wishlist', compact('products'));
    //     } else {
    //         return redirect()->route('auth.signin');
    //     }
    // }
}