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
        //
        return view("client.account.checkout");
    }
}
