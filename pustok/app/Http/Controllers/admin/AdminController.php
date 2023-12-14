<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\account\RegisterRequest;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.dashboard");
    }

    public function login()
    {
        return view("admin.auth.login");
    }


    public function signin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('manager.dashboard');
        } else {
            return back()->with('type', 'error')->with('message', 'Email or password is invalide');
        }
    }

    public function register()
    {
        return view("admin.auth.register");
    }

    public function signup(RegisterRequest $request)
    {
        $data = $request->all();
        unset($data['repeat_password']);
        $data['is_admin'] = 1;

        $created = User::create($data);

        if ($created) {
            return redirect()->route("manager.dashboard")
                ->with('type', 'success')
                ->with('message', 'Wellcome to The Pustok Admin Panel');
        } else {
            return redirect()->back()
                ->with('type', 'danger')
                ->with('message', 'Something went wrong');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('manager.login');
    }
}
