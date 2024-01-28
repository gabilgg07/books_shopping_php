<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Book $book)
    {
        if (!$book) {
            return abort(404);
        }

        $price = $book->campaign ? $book->price - ($book->price * $book->campaign->discount_percent / 100) : $book->price;
        $user_id = auth()->user() ? auth()->user()->id : null;

        Cart::add([
            'id' => $book->id,
            'name' => $book->title,
            'qty' => 1,
            'price' => $price,
            'options' => [
                'image' => $book->mainImage()->image,
                'user_id' => $user_id
            ]
        ]);

        return redirect()->back();
    }
}
