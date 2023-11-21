<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(){
        return view("client.account.index");
    }

    public function login(){
        return view("client.account.login");
    }

    public function register(){
        return view("client.account.register");
    }
}