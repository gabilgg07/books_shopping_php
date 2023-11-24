<?php

use App\Http\Controllers\client\AccountController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\ShopController;
use Illuminate\Support\Facades\Route;


Route::group(["prefix" => "", "as" => "client."], function () {
    Route::get("/", [HomeController::class, "index"])->name("home.index");

    Route::get("/shop", [ShopController::class, "index"])->name("shop.index");
    Route::get("/shop/card", [ShopController::class, "card"])->name("shop.card");
    Route::get("/shop/{id?}", [ShopController::class, "details"])->name("shop.details");

    Route::get("/contact", ContactController::class)->name("contact");

    Route::group(["middleware" => "auth", "prefix" => "/account", "as" => "account."], function () {
        Route::get("", [AccountController::class, "index"])->name("index");
        Route::get("/logout", [AccountController::class, "logout"])->name("logout");
    });
});



Route::group(["prefix" => "", "as" => "auth."], function () {
    // Route::get("/register", [AccountController::class, "register"])->name("client.account.register");
    // Route::get("/login", [AccountController::class, "login"])->name("client.account.login");

    // Route::get("/account", [AccountController::class, "index"])->name("client.account.index");
    // Route::get("/logout", [AccountController::class, "logout"])->name("client.account.logout");
    // Route::get("/checkout", [AccountController::class, "checkout"])->name("client.account.checkout");


    Route::get("/signup", [AccountController::class, "signup"])->name("signup");
    Route::post("/register", [AccountController::class, "register"])->name("register");

    Route::get("/signin", [AccountController::class, "signin"])->name("signin");
    Route::post("/login", [AccountController::class, "login"])->name("login");
});
