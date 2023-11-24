<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\client\account\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        return view("client.account.index");
    }

    public function signup()
    {
        return view("client.account.register");
    }
    public function register(RegisterRequest $request)
    {
        // dd($request->all());
        // dd($request->except("_token"));

        $created = User::create($request->all());
        // dump($created->all());
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
            return redirect()->route('client.home.index');
        } else {
            // return back()->with('error', __('form.password_invalid'));
            return back()->with('error', 'Email or password is invalide');
        }
    }

    public function logout()
    {
        //
        return view("client.account.login");
    }

    public function checkout()
    {
        //
        return view("client.account.checkout");
    }
}
