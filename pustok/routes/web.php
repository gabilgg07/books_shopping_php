<?php

// admin controllers
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AccountController as AdminAccountController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\LangsController;
use App\Http\Controllers\admin\LanguageLineController;
use App\Http\Controllers\admin\UsersController;

// client controllers
use App\Http\Controllers\client\AccountController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\ShopController;

// others
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Client 

// Client Out of Auth
Route::group(["middleware" => ['web', 'auth.user.check', 'check.route'], "prefix" => LaravelLocalization::setLocale() . "", "as" => "auth."], function () {
    Route::get("/signup", [AccountController::class, "signup"])->name("signup");
    Route::post("/register", [AccountController::class, "register"])->name("register");

    Route::get("/signin", [AccountController::class, "signin"])->name("signin");
    Route::post("/login", [AccountController::class, "login"])->name("login");
});

// Client Logined
Route::group(["middleware" => ['check.route'], "prefix" => LaravelLocalization::setLocale() . "", "as" => "client."], function () {
    Route::get("/", [HomeController::class, "index"])->name("home.index");

    Route::get("/shop", [ShopController::class, "index"])->name("shop.index");
    Route::get("/shop/card", [ShopController::class, "card"])->name("shop.card");
    Route::get("/shop/wishlist", [ShopController::class, "wishlist"])->name("shop.wishlist");
    Route::get("/shop/{book?}", [ShopController::class, "details"])->name("shop.details");

    Route::get("/contact", ContactController::class)->name("contact");

    Route::group(["middleware" => "auth.user", "prefix" => "/account", "as" => "account."], function () {
        Route::get("", [AccountController::class, "index"])->name("index");
        Route::get("/logout", [AccountController::class, "logout"])->name("logout");
        Route::get("/checkout", [AccountController::class, "checkout"])->name("checkout");
    });
});

// Admin 

// Admin Out of Auth
Route::group(["middleware" => ["auth.admin.check", 'check.route'], "prefix" => LaravelLocalization::setLocale() . "/manager", "as" => "manager."], function () {
    Route::get("/register", [AdminController::class, "register"])->name("register");
    Route::post("/signup", [AdminController::class, "signup"])->name("signup");
    Route::get("/login", [AdminController::class, "login"])->name("login");
    Route::post("/signin", [AdminController::class, "signin"])->name("signin");
});

// Admin Logined
Route::group([
    "middleware" => ['web', 'auth.admin', 'check.route'],
    "prefix" => LaravelLocalization::setLocale() . "/manager",
    "as" => "manager."
], function () {
    Route::get("", [AdminController::class, "index"])->name("dashboard");
    Route::get("/logout", [AdminController::class, "logout"])->name("logout");

    Route::prefix('/account')->group(function () {
        Route::get("/", [AdminAccountController::class, "index"])->name("account.index");
        Route::patch("/update", [AdminAccountController::class, "update"])->name("account.update");
        Route::patch("/change-password", [AdminAccountController::class, "changePassword"])->name("account.changePassword");
    });

    Route::get("/langs/deleteds", [LangsController::class, 'deleteds'])->name('langs.deleteds');
    Route::get("/langs/restore/{lang}", [LangsController::class, 'restore'])->name('langs.restore');
    Route::delete("/langs/permanently_delete/{lang}", [LangsController::class, 'permanently_delete'])->name('langs.permanently_delete');
    Route::resource("/langs", LangsController::class);

    Route::get("/language_line/deleteds", [LanguageLineController::class, 'deleteds'])->name('language_line.deleteds');
    Route::get("/language_line/restore/{language_line}", [LanguageLineController::class, 'restore'])->name('language_line.restore');
    Route::delete("/language_line/permanently_delete/{language_line}", [LanguageLineController::class, 'permanently_delete'])->name('language_line.permanently_delete');
    Route::resource("/language_line", LanguageLineController::class);

    Route::get("/categories/deleteds", [CategoriesController::class, 'deleteds'])->name('categories.deleteds');
    Route::get("/categories/restore/{category}", [CategoriesController::class, 'restore'])->name('categories.restore');
    Route::resource("/categories", CategoriesController::class);

    Route::resource("/users", UsersController::class);
});
