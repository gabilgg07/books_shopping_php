<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\HeroSlider;
use App\Models\Review;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // if (Review::all()->count()) {
        //     $featureds = Book::where('is_deleted', 0)->where('is_active', 1)->leftJoin('reviews', 'books.id', '=', 'reviews.book_id')
        //         ->selectRaw('books.*, AVG(reviews.rate) as average_rate')
        //         ->groupBy('books.id')
        //         ->orderByDesc('average_rate')
        //         ->take(10)
        //         ->get();
        // } else {
        // }

        // if (Review::all()->count()){
        //     $featureds = Review::orderByDesc('rate')->book->get();
        // }
        // if (Review::count()) {
        //     $featureds = Book::orWhereHas('reviews', function (Builder $query) {
        //         $query->selectRaw('avg(rate) as avg_rate')
        //             ->groupBy('book_id')
        //             ->orderByDesc('avg_rate');
        //     })
        //         ->with(['reviews' => function ($query) {
        //             $query->select(['book_id', 'user_id', 'rate']);
        //         }])->orWhere('is_deleted', 0)->where('is_active', 1)
        //         ->get();
        // }
        // if (Review::count()) {
        //     $featureds = Book::leftJoin('reviews', 'books.id', '=', 'reviews.book_id')
        //         ->select('books.*', DB::raw('avg(reviews.rate) as avg_rate'))
        //         ->groupBy('books.id')
        //         ->orderByDesc('avg_rate')
        //         ->orderBy('books.created_at', 'desc') // You can adjust this based on your sorting criteria
        //         ->get();
        // } else {
        //     // If there are no reviews, get all books based on your default criteria
        //     $featureds = Book::where('is_deleted', 0)
        //         ->where('is_active', 1)
        //         ->orderBy('created_at', 'desc') // You can adjust this based on your default sorting criteria
        //         ->get();
        // }
        // if (Review::count()) {
        //     $featureds = Book::leftJoin('reviews', 'books.id', '=', 'reviews.book_id')
        //         ->select('books.id', 'books.title', 'books.created_at', 'books.price', 'campaign_id', DB::raw('avg(reviews.rate) as avg_rate'))
        //         ->groupBy('books.id', 'books.title', 'books.created_at', 'books.price', 'campaign_id')
        //         ->orderByDesc('avg_rate')
        //         ->orderBy('books.created_at', 'desc')->where('is_deleted', 0)
        //         ->where('is_active', 1);
        // } else {
        //     $featureds = Book::where('is_deleted', 0)
        //         ->where('is_active', 1)
        //         ->orderBy('created_at', 'desc');
        // }

        // BOOK modelimizin rate fieldi olmayanda:
        // $featureds = $featureds?->take(12)->get();


        $featureds = Book::where('is_deleted', 0)->where('is_active', 1)->orderBy('rate', 'desc')->take(12)->get();

        $new_arrivals = Book::where('is_deleted', 0)->where('is_active', 1)->orderByDesc('created_at')->take(12)->get();

        $most_view_books = Book::where('is_deleted', 0)->where('is_active', 1)->orderByDesc('views')->take(12)->get();

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
