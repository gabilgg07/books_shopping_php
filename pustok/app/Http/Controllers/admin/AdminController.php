<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\account\RegisterRequest;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

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
            "email" => ["required", "email"],
            "password" => "required",
        ]);

        $user = $request->user();
        if ($user->password != $request->password) {
            return back()->withErrors(["email" => "Email or Password incorrect!"]);
        }
        return view("admin.auth.login");
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
            return redirect()->route("auth.signin")->with("success", "");
        } else {
            dd("error");
        }
    }
}