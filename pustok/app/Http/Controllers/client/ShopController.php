<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ShopController extends Controller
{
    public function index($slug = null)
    {
        $books = Book::where('is_deleted', 0)->where('is_active', 1);
        if (isset($_REQUEST['campaign_id'])) {
            $books = $books->where('campaign_id', $_REQUEST['campaign_id']);
        }
        if (trim($slug)) {
            $category = Category::where('slug->' . LaravelLocalization::getCurrentLocale(), $slug)->where('is_deleted', 0)->where('is_active', 1)->first();
            if ($category) {
                if ($category->parent_id === 0) {
                    $childCategoryIds = $category->childCategories->pluck('id')->toArray();
                    $books = $books->whereIn('category_id', $childCategoryIds);
                } else {
                    $books = $books->where('category_id', $category->id)->with('bookImages');
                }
            }
        } else {
            $books = $books->with('bookImages');
        }

        $books = $books->paginate(8);
        return view("client.shop.index", compact('books'));
    }
    public function details(Book $book)
    {
        if ($book && $book->is_deleted === 0 && $book->is_active === 1) {

            return view("client.shop.details", compact('book'));
        } else {
            // return redirect()->back()->with('msgType', 'error')->with('msg','Not Found');
            return abort(404);
        }
    }
    public function card()
    {
        return view("client.shop.card");
    }
    public function wishlist()
    {
        return view("client.shop.wishlist");
    }
}
