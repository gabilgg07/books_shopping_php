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
use App\Http\Controllers\admin\OrdersController;
use App\Http\Controllers\admin\SlidersController;
use App\Http\Controllers\admin\UsersController;

// client controllers
use App\Http\Controllers\client\AccountController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\client\CurrencyController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\ShopController;
use App\Http\Controllers\client\ShoppingCart;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
// others
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// LaravelLocalization::getCurrentLocale()

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

    // HOME
    Route::get("/", [HomeController::class, "index"])->name("home.index");

    // SHOP
    Route::get("/shop/{slug?}", [ShopController::class, "index"])->name("shop.index");
    Route::get("/shop/details/{book}", [ShopController::class, "details"])->name("shop.details");
    Route::get("/shop/get-details/{book}", [ShopController::class, "getDetails"])->name("shop.getDetails");
    Route::get("/contact", ContactController::class)->name("contact");

    // CART
    Route::get("/cart", [CartController::class, "index"])->name("cart");
    Route::get("/cart/{rowId}/remove", [CartController::class, "removeFromCart"])->name("cart.remove");
    Route::get("/cart/{book}", [CartController::class, "addToCart"])->name("cart.add");
    Route::post("/cart/update", [CartController::class, "updateCart"])->name("cart.update");
    Route::post("/cart/update-from-modal", [CartController::class, "updateCartFromModal"])->name("cart.update.modal");

    // AUTH
    Route::group(["middleware" => "auth.user"], function () {
        Route::group(["prefix" => "/account", "as" => "account."], function () {
            Route::get("", [AccountController::class, "index"])->name("index");
            Route::get("/logout", [AccountController::class, "logout"])->name("logout");
            Route::get("/checkout", [AccountController::class, "checkout"])->name("checkout");
            Route::post("/place-order", [AccountController::class, "placeOrder"])->name("placeOrder");
            Route::post("/update-password", [AccountController::class, "updatePassword"])->name("updatePassword");
        });

        Route::post("/shop/add-review", [ShopController::class, "addReview"])->name("shop.addReview");
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

Route::middleware(['web', 'auth.admin', 'check.route'])
    ->prefix(LaravelLocalization::setLocale() . "/manager")
    ->as("manager.")
    ->group(function () {
        Route::get("", [AdminController::class, "index"])->name("dashboard");
        Route::get("/logout", [AdminController::class, "logout"])->name("logout");

        Route::prefix('/orders')->as('orders.')->group(function () {
            Route::get("/index", [OrdersController::class, "index"])->name("index");
            Route::get("/accept/{order}", [OrdersController::class, "accept"])->name("accept");
            Route::get("/reject/{order}", [OrdersController::class, "reject"])->name("reject");
            Route::get("/details/{order}", [OrdersController::class, "details"])->name("details");
            Route::delete("/destroy/{order}", [OrdersController::class, "destroy"])->name("destroy");
            Route::get("/deleteds", [OrdersController::class, 'deleteds'])->name("deleteds");
            Route::delete("/restore/{order}", [OrdersController::class, "restore"])->name("restore");
            Route::delete("/permanently_delete/{order}", [OrdersController::class, 'permanently_delete'])->name("permanently_delete");
        });

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





// Route::group([
//     "middleware" => ['web', 'auth.admin', 'check.route'],
//     "prefix" => LaravelLocalization::setLocale() . "/manager",
//     "as" => "manager."
// ], function () {
//     Route::get("", [AdminController::class, "index"])->name("dashboard");
//     Route::get("/logout", [AdminController::class, "logout"])->name("logout");

//     Route::group(['prefix'=>'/orders', 'as'=>'orders.', 'controller'=> OrdersController::class], function(){

//         Route::get("/index", ["index"])->name("index");
//         Route::get("/accept/{order}", ["accept"])->name("accept");
//         Route::get("/reject/{order}", ["reject"])->name("reject");
//         Route::get("/details/{order}", ["details"])->name("details");
//         Route::get("/destroy/{order}", ["destroy"])->name("destroy");
//         Route::get("/deleteds", ['deleteds'])->name("deleteds");
//     });


//     Route::prefix('/account')->group(function () {
//         Route::get("/", [AdminAccountController::class, "index"])->name("account.index");
//         Route::patch("/update", [AdminAccountController::class, "update"])->name("account.update");
//         Route::patch("/change-password", [AdminAccountController::class, "changePassword"])->name("account.changePassword");
//     });

//     defineResourceRoutes('langs', 'lang', LangsController::class);
//     defineResourceRoutes('language_line', 'language_line', LanguageLineController::class);
//     defineResourceRoutes('categories', 'category', CategoriesController::class);
//     defineResourceRoutes('users', 'user', UsersController::class);
//     defineResourceRoutes('campaigns', 'campaign', CampaignsController::class);
//     defineResourceRoutes('books', 'book', BooksController::class);
//     defineResourceRoutes('sliders', 'slider', SlidersController::class);
//     defineResourceRoutes('brands', 'brand', BrandsController::class);
// });



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

Route::get("/currency", [CurrencyController::class, "index"])->name("currency");

// Route::get("/event", function () {
//     event(new OrderPlaced());

//     return "Order placed successfully!";
// });

$jsonData = Cache::get('currency_data');

// If not in the cache, fetch data from the API and store it in the cache
if (!$jsonData) {
    $response = Http::get('https://api.fastforex.io/fetch-multi?from=USD&to=EUR,GBP,AZN,RUB,TRY&api_key=68ce4283fe-ed772e671a-s7yiza');
    $jsonData = $response->json();

    // Cache the data for a day
    Cache::put('currency_data', $jsonData, now()->addDay());
}
