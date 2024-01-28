<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CartController extends Controller
{
    public function index()
    {
        $bookIds = Cart::content()->pluck('id')->toArray();

        $books = Book::where('is_active', 1)->where('is_deleted', 0);

        foreach (Cart::content() as $key => $cart) {
            $book = Book::where('is_deleted', 0)->where('is_active', 1)->find($cart->id);
            if ($book) {
                if ($book->campaign_id) {
                    $books = $books->where('campaign_id', $book->campaign_id)->whereNotIn('id', $bookIds)->where('is_active', 1)->where('is_deleted', 0);
                }
                $books = $books->orWhere('category_id', $book->category_id)->whereNotIn('id', $bookIds)->where('is_active', 1)->where('is_deleted', 0);
            }
        }
        $books = $books->where('is_active', 1)->where('is_deleted', 0);

        $books = $books->take(8)->get();

        return view('client.cart', compact('books'));
    }
    public function addToCart(Book $book)
    {
        if (!$book) {
            return abort(404);
        }

        $price = $book->campaign ? $book->price - ($book->price * $book->campaign->discount_percent / 100) : $book->price;
        $user_id = auth()->user() ? auth()->user()->id : null;

        $name = json_encode($book->getTranslations('title'));

        Cart::add([
            'id' => $book->id,
            'name' => $name,
            'qty' => 1,
            'price' => $price,
            'weight' => 0,
            'options' => [
                'image' => $book->mainImage()->image,
                'user_id' => $user_id,
            ]
        ]);

        return redirect()->back();
    }


    public function removeFromCart($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }

    public function updateCart(Request $request)
    {

        if ($request->qty) {
            foreach ($request->qty as $key => $value) {
                Cart::update($key, $value);
            }

            return redirect()->back()->with('msgType', 'success')->with('message', 'Cart successfully updated');
        }

        return redirect()->back()->with('msgType', 'error')->with('message', 'Failed to update cart!');
    }

    public function updateCartFromModal(Request $request)
    {

        if ($request->qty && $request->book_id) {

            $id = $request->book_id;
            $rowId = 0;
            $qty = $request->qty;

            // BELE BIR VARIANT DA VAR:
            // $cart = Cart::search(function ($cartItem, $rowId) use($id) {
            //     return $cartItem->id === $id;
            // });

            foreach (Cart::content() as $item) {
                if ($item->id == $id) {
                    $rowId = $item->rowId;
                    $qty += $item->qty;
                    break;
                }
            }
            if ($rowId) {
                Cart::update($rowId, $qty);
            } else {
                $book = Book::find($id);
                if (!$book) {
                    return abort(404);
                }

                $price = $book->campaign ? $book->price - ($book->price * $book->campaign->discount_percent / 100) : $book->price;
                $user_id = auth()->user() ? auth()->user()->id : null;

                $name = json_encode($book->getTranslations('title'));

                Cart::add([
                    'id' => $book->id,
                    'name' => $name,
                    'qty' => $qty,
                    'price' => $price,
                    'weight' => 0,
                    'options' => [
                        'image' => $book->mainImage()->image,
                        'user_id' => $user_id,
                    ]
                ]);
            }

            return redirect()->back()->with('msgType', 'success')->with('message', 'Cart successfully updated');
        }

        return redirect()->back()->with('msgType', 'error')->with('message', 'Failed to update cart!');
    }


    public function destroy()
    {
        Cart::destroy();
        return redirect()->back();
    }
}
