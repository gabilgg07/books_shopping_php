<?php

use App\Http\Controllers\client\AccountController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\ShopController;
use Illuminate\Support\Facades\Route;


Route::get("/",[HomeController::class,"index"])->name("client.home.index");
Route::get("/shop",[ShopController::class,"index"])->name("client.shop.index");
Route::get("/shop/{id?}",[ShopController::class,"details"])->name("client.shop.details");
Route::get("/contact",ContactController::class)->name("client.contact");
// Route::get("/account",[AccountController::class,"index"])->name("client.account.index");
Route::get("/login",[AccountController::class,"login"])->name("client.account.login");
Route::get("/register",[AccountController::class,"register"])->name("client.account.register");