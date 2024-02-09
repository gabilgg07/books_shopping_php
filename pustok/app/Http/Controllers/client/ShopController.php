<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
                    $books = $books->orWhere('category_id', $category->id);
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
                $books = $books->orderBy('rate', 'desc');
                break;
            case 'r_lh':
                $books = $books->orderBy('rate', 'asc');
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
            $book->views = $book->views + 1;
            $book->save();
            $relatedBooks = Book::orWhere('category_id', $book->category_id);
            if ($book->campaign_id) {
                $relatedBooks = $relatedBooks->orWhere('campaign_id', $book->campaign_id);
            }
            $relatedBooks = $relatedBooks->where('id', '!=', $book->id)
                ->where('is_deleted', 0)
                ->where('is_active', 1)
                ->take(8)->get();
            if ($relatedBooks->count() < 5) {
                $relatedBooks = Book::where('is_deleted', 0)
                    ->where('is_active', 1)
                    ->orderBy('created_at', 'desc')
                    ->where('id', '!=', $book->id)
                    ->take(8)->get();
            }

            return view("client.shop.details", compact('book', 'relatedBooks'));
        } else {
            return abort(404);
        }
    }

    public function getDetails(Book $book)
    {
        if (!$book) {
            return json_encode([
                'type' => 'danger',
                'message' => "Book not found!",
            ]);
        }
        $book->views = $book->views + 1;
        $book->save();

        return view('client.layouts.includes.details_modal', compact('book'));
    }


    public function addReview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rate' => 'required',
            'book_id' => 'required',
            'star' => 'required',
            'message' => 'nullable|min:3',
        ], [
            'rate.required' => 'Rate ' . __('validation.required'),
            'book_id.required' => 'Book Id ' . __('validation.required'),
            'star.required' => 'Star ' . __('validation.required'),
            'min' => 'Message ' . __('validation.min'),
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find(auth()->user()->id);
        $book = Book::find($request->book_id);
        if ($user) {
            $entity = $user->reviews->where('book_id', $request->book_id)->first();
            if ($entity) {
                return redirect()->back()->with('msgType', 'error')->with('message', 'You alredy have review for this book!');
            }
        }

        if ($request->star) {
            $data = [
                'book_id' => $request->book_id,
                'user_id' => auth()->user()->id,
                'rate' => $request->rate,
                'comment' => $request->message,
            ];
            $review = Review::create($data);
            if (!$review) {
                return redirect()->back()->with('msgType', 'error')->with('message', 'Failed to add review!');
            }

            if ($book) {
                $book->rate = round($book->reviews->avg('rate'), 2);
                $book->save();
            }

            return redirect()->back()->with('msgType', 'success')->with('message', 'Review succesfully added!');
        }



        return redirect()->back();
    }
}
