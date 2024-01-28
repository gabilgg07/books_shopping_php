<?php

// admin controllers

// use App\Events\OrderPlaced;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AccountController as AdminAccountController;
use App\Http\Controllers\admin\BooksController;
use App\Http\Controllers\admin\BrandsController;
use App\Http\Controllers\admin\CampaignsController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\LangsController;
use App\Http\Controllers\admin\LanguageLineController;
use App\Http\Controllers\admin\SlidersController;
use App\Http\Controllers\admin\UsersController;

// client controllers
use App\Http\Controllers\client\AccountController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\client\CurrencyController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\ShopController;
use App\Http\Controllers\client\ShoppingCart;
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

    Route::get("/shop/{slug?}", [ShopController::class, "index"])->name("shop.index");
    Route::get("/shop/card", [ShopController::class, "card"])->name("shop.card");
    Route::get("/shop/wishlist", [ShopController::class, "wishlist"])->name("shop.wishlist");
    Route::get("/shop/details/{book}", [ShopController::class, "details"])->name("shop.details");
    Route::get("/shop/get-details/{book}", [ShopController::class, "getDetails"])->name("shop.getDetails");

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
    // Route::get("/register", [AdminController::class, "register"])->name("register");
    // Route::post("/signup", [AdminController::class, "signup"])->name("signup");
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

    defineResourceRoutes('langs', 'lang', LangsController::class);
    defineResourceRoutes('language_line', 'language_line', LanguageLineController::class);
    defineResourceRoutes('categories', 'category', CategoriesController::class);
    defineResourceRoutes('users', 'user', UsersController::class);
    defineResourceRoutes('campaigns', 'campaign', CampaignsController::class);
    defineResourceRoutes('books', 'book', BooksController::class);
    defineResourceRoutes('sliders', 'slider', SlidersController::class);
    defineResourceRoutes('brands', 'brand', BrandsController::class);
});



// define function:
function defineResourceRoutes($table_name, $model_name, $controller)
{
    Route::get("/$table_name/deleteds", [$controller, 'deleteds'])->name("$table_name.deleteds");
    Route::get("/$table_name/restore/{{$model_name}}", [$controller, 'restore'])->name("$table_name.restore");
    Route::delete("/$table_name/permanently_delete/{{$model_name}}", [$controller, 'permanently_delete'])->name("$table_name.permanently_delete");
    Route::patch("/$table_name/change_active", [$controller, 'change_active'])->name("$table_name.change_active");
    Route::resource("/$table_name", $controller)->except(['deleteds', 'restore', 'permanently_delete', 'change_active']);
}

// Route::get("/add-to-cart/{id}", [ShoppingCart::class, "add"])->name("add");
// Route::get("/remove-from-cart/{id}", [ShoppingCart::class, "remove"])->name("remove");
// Route::get("/clear-cart", [ShoppingCart::class, "destroy"])->name("clear");

// Route::get("/curency", [CurrencyController::class, "index"])->name("cureency");

// Route::get("/event", function () {
//     event(new OrderPlaced());

//     return "Order placed successfully!";
// });