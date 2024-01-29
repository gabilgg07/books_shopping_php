<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\client\account\RegisterRequest;
use App\Http\Requests\client\OrderRequest;
use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    // static $counter = 0;
    public function index()
    {
        $user = User::find(auth()->user()->id);
        if (!$user) {
            return abort(404);
        }

        return view("client.account.index", compact('user'));
    }

    public function signup()
    {
        return view("client.account.register");
    }
    public function register(RegisterRequest $request)
    {
        $data = $request->all();
        unset($data['repeat_password']);
        $created = User::create($data);

        if ($created) {
            return redirect()->route("auth.signin")->with("success", "");
        } else {
            dd("error");
        }
    }

    public function signin()
    {
        return view("client.account.login");
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            if (auth()->user()->is_admin || auth()->user()->is_deleted || !auth()->user()->is_active) {
                auth()->logout();
                return back()->with('error', 'Email or password is invalide');
            }
            return redirect()->route('client.account.index');
        } else {
            // return back()->with('error', __('form.password_invalid'));
            return back()->with('error', 'Email or password is invalide');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.signin');
    }

    public function checkout()
    {
        return view("client.account.checkout");
    }


    public function placeOrder(OrderRequest $request)
    {
        $user = User::find(auth()->user()->id);
        if ($user) {
            if ((!$user->phone) || $user->phone != $request->phone) {
                $user->phone = $request->phone;
                $user->save();
            }
        }
        $data = $request->except(['_token', 'phone']);
        $data['user_id'] = $user->id;
        $data['total_count'] = Cart::content()->count();
        $data['total_price'] = Cart::initial();
        $count = Order::orderBy('order_number', 'desc')->first()
            ? Order::orderBy('order_number', 'desc')->first()->order_number + 1 : 1;
        $order_number = str_pad($count, 4, '0', STR_PAD_LEFT);
        $data['order_number'] = $order_number;
        $order = Order::create($data);

        if (!$order) {
            return redirect()->back()->with('msgType', 'error')->with('message', 'Failed to create order!');
        }

        foreach (Cart::content() as $key => $cart) {
            $book = Book::find($cart->id);
            if ($book) {
                if ($book->count - $cart->qty >= 0) {
                    $dataItem = [
                        'book_id' => $book->id,
                        'order_id' => $order->id,
                        'qty' => $cart->qty,
                        'price' => $book->price,
                        'total_price' => $cart->price * $cart->qty,
                        'created_by_user_id' => $user->id,
                    ];
                    if ($book->campaign) {
                        $dataItem['discount'] = $book->campaign->discount_percent;
                        $dataItem['discount_price'] = $cart->price;
                    }

                    $orderItem = OrderItem::create($dataItem);
                    if ($orderItem) {
                        $book->count -= $cart->qty;
                        $book->updated_by_user_id = $user->id;
                        $book->save();
                    }
                } else {
                    return redirect()->back()->with('msgType', 'error')->with('message', 'Failed to create order! Because book id: ' . $book->id . ' count is not enough');
                }
            } else {
                return redirect()->back()->with('msgType', 'error')->with('message', 'Failed to create order! Because book id: ' . $book->id . ' not found');
            }
        }

        Cart::destroy();

        return view("client.account.order_complete", compact('order'));
    }


    public function updatePassword(Request $request)
    {
        $user = User::find(auth()->user()->id);

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Old password is incorrect');
        }

        $validator = Validator::make($request->all(), [
            'new_password' => 'required|string|min:3|confirmed',
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->password = Hash::make($request->new_password);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully');
    }
}
