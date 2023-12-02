<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\client\AccountController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\ShopController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(["prefix" => "", "as" => "client."], function () {
    Route::get("/", [HomeController::class, "index"])->name("home.index");

    Route::get("/shop", [ShopController::class, "index"])->name("shop.index");
    Route::get("/shop/card", [ShopController::class, "card"])->name("shop.card");
    Route::get("/shop/wishlist", [ShopController::class, "wishlist"])->name("shop.wishlist");
    Route::get("/shop/{id?}", [ShopController::class, "details"])->name("shop.details");

    Route::get("/contact", ContactController::class)->name("contact");

    Route::group(["middleware" => "auth", "prefix" => "/account", "as" => "account."], function () {
        Route::get("", [AccountController::class, "index"])->name("index");
        Route::get("/logout", [AccountController::class, "logout"])->name("logout");
        Route::get("/checkout", [AccountController::class, "checkout"])->name("checkout");
    });
});



Route::group(["middleware" => "auth.check", "prefix" => "", "as" => "auth."], function () {
    Route::get("/signup", [AccountController::class, "signup"])->name("signup");
    Route::post("/register", [AccountController::class, "register"])->name("register");

    Route::get("/signin", [AccountController::class, "signin"])->name("signin");
    Route::post("/login", [AccountController::class, "login"])->name("login");
});

Route::group(["prefix" => LaravelLocalization::setLocale() . "/manage", "as" => "admin."], function () {
    Route::get("/", [AdminController::class, "index"])->name("dashboard");
    Route::resource("/categories", CategoriesController::class);
});