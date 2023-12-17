<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Lang;
use App\Services\DataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function __construct(private DataService $dataService)
    {
    }

    public function index()
    {
        $categories = Category::paginate(10);
        return view("admin.categories.index", compact("categories"));
    }

    public function create()
    {
        $langs = Lang::all();
        $categories = Category::where('parent_id', 0)->get();
        return view("admin.categories.create", compact("categories", 'langs'));
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'title' => ['required', 'array', Rule::unique('categories', 'title')],
        //     // 'title' => 'required|array',
        //     'title.*' => ['required', 'max:255'],
        // ]);
        $this->validate($request, [
            'title' => ['required', 'array'],
            'title.*' => ['required', 'max:255', function ($attribute, $value, $fail) use ($request) {
                $slug = Str::slug($value);
                $keyValue = Str::of($attribute)->afterLast('.');
                $existingTitles = Category::whereJsonContains('slug->' . $keyValue, $slug)->exists();
                // $exists = DB::table('categories')
                //     ->whereRaw('JSON_CONTAINS(slug, JSON_QUOTE(?), "$.' . $keyValue . '")', [$slug])
                //     ->exists();
                // dump($existingTitles);
                if ($existingTitles) {
                    $fail("The $attribute must be unique.");
                }
            }],
        ]);

        $data = $request->all();
        $data['is_deleted'] = (bool)$request->is_deleted;
        $data['slug'] = $this->dataService->sluggableArray($data, 'title');
        $created = Category::create($data);
        if ($created) {
            return redirect()->route("manager.categories.index")
                ->with('type', 'success')
                ->with('message', 'Category has been stored.');
        } else {
            return redirect()->back()
                ->with('type', 'danger')
                ->with('message', 'Something went wrong!');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Category $category)
    {
        // $this->validate($category, [
        //     "title" => "required|array",
        // ]);
        // $langs = Lang::all();
        // $categories = Category::where('parent_id', 0)->get();
        // // dd($category);
        // if ($category) {
        //     return view('admin.categories.edit', compact('langs', 'categories', 'category'));
        // } else {
        //     return '404 Not Faund';
        // }

        $langs = Lang::all();
        $categories = Category::where('parent_id', 0)->get();
        if ($category) {
            return view('admin.categories.edit', compact('langs', 'categories', 'category'));
        } else {
            abort(404);
        }
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            // 'title' => ['required', 'array', Rule::unique('categories', 'title')->ignore($category->id)],
            'title' => ['required', 'array'],
            'title.*' => ['required', 'max:255'],
        ]);

        $data = $request->all();
        $data['is_deleted'] = (bool)$request->is_deleted;
        $data['slug'] = $this->dataService->sluggableArray($data, 'title');
        $updated = $category->update($data);

        if ($updated) {
            return redirect()->route("manager.categories.index")
                ->with('type', 'success')
                ->with('message', 'Category has been updated.');
        } else {
            return redirect()->back()
                ->with('type', 'danger')
                ->with('message', 'Something went wrong!');
        }
    }

    public function destroy(Category $category)
    {
        $deleted = $category->delete();

        if ($deleted) {
            return redirect()->route("manager.categories.index")
                ->with('type', 'success')
                ->with('message', 'Category has been deleted.');
        } else {
            return redirect()->back()
                ->with('type', 'danger')
                ->with('message', 'Failed to delete category!');
        }
    }
}