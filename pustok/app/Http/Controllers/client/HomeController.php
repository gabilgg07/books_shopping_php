<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\HeroSlider;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero_sliders = HeroSlider::where('is_deleted', 0)->where('is_active', 1)->get();
        $categories = Category::where('is_deleted', 0)->where('is_active', 1);
        $galery_categoriers = [
            'single' => $categories->whereNotNull('image')->first(),
            'galery' => $categories->whereNotNull('image')->skip(1)->take(4)->get(),
        ];
        $best_seller = Book::where('is_deleted', 0)->where('is_active', 1)->withCount('orderItems')
            ->orderByDesc('order_items_count')
            ->take(12)
            ->get();

        if (Review::all()->count()) {
            $featureds = Book::where('is_deleted', 0)->where('is_active', 1)->leftJoin('reviews', 'books.id', '=', 'reviews.book_id')
                ->selectRaw('books.*, AVG(reviews.rate) as average_rate')
                ->groupBy('books.id')
                ->orderByDesc('average_rate')
                ->take(10)
                ->get();
        } else {
            $featureds = Book::where('is_deleted', 0)->where('is_active', 1)->orderByDesc('price')->take(12)->get();
        }

        $new_arrivals = Book::where('is_deleted', 0)->where('is_active', 1)->orderByDesc('created_at')->take(12)->get();

        $most_view_books = Book::where('is_deleted', 0)->where('is_active', 1)->orderByDesc('views')->take(12)->get();


        // dd($featureds);

        $home_index_vm = [
            'hero_sliders' => $hero_sliders,
            'galery_categoriers' => $galery_categoriers,
            'best_seller' => $best_seller,
            'featureds' => $featureds,
            'new_arrivals' => $new_arrivals,
            'most_view_books' => $most_view_books,
        ];

        return view("client.home.index", compact('home_index_vm'));
    }
}
