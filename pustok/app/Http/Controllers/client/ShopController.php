<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ShopController extends Controller
{
    public function index(Request $request, $slug = null)
    {
        $books = Book::where('is_deleted', 0)->where('is_active', 1);
        if ($request->campaign_id) {
            $books = $books->where('campaign_id', $request->campaign_id);
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

        $sortBy = $request->input('sort_by', '');
        $lang = LaravelLocalization::getCurrentLocale();
        switch ($sortBy) {
            case 'az':
                $books = $books->orderBy("title->{$lang}", 'asc');
                break;
            case 'za':
                $books = $books->orderBy("title->{$lang}", 'desc');
                break;
            case 'p_lh':
                $books = $books->orderBy('price', 'asc');
                break;
            case 'p_hl':
                $books = $books->orderBy('price', 'desc');
                break;
            case 'r_hl':
                $books = $books->orderBy('reviews', 'desc');
                break;
            case 'r_lh':
                $books = $books->orderBy('reviews', 'asc');
                break;
            default:
                $books = $books->orderBy('created_at', 'asc');
                break;
        }

        $books = $books->paginate(8);
        return view("client.shop.index", compact('books'));
    }
    public function details(Book $book)
    {
        if ($book && $book->is_deleted === 0 && $book->is_active === 1) {
            return view("client.shop.details", compact('book'));
        } else {
            return abort(404);
        }
    }

    // public function getDetails(Book $book)
    // {
    //     if (!$book) {
    //         return json_encode([
    //             'type' => 'danger',
    //             'message' => "Book not found!",
    //         ]);
    //     }

    //     try {
    //         $data = [
    //             'book' => $book,
    //             'category' => $book->category,
    //             'campaign' => $book->campaign,
    //             'mainImage' => $book->mainImage(),
    //             'images' => $book->images(),
    //         ];
    //     } catch (\Throwable $th) {
    //         return json_encode([
    //             'type' => 'danger',
    //             'message' => $th->getMessage(),
    //         ]);
    //     }

    //     return json_encode([
    //         'type' => 'success',
    //         'data' => $data,
    //     ]);
    // }


    public function getDetails(Book $book)
    {
        if (!$book) {
            return json_encode([
                'type' => 'danger',
                'message' => "Book not found!",
            ]);
        }

        return view('client.layouts.includes.details_modal', compact('book'));
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
