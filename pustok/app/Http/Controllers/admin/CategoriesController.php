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
        $categories = Category::where('is_deleted', 0)->get();
        return view("admin.categories.index", compact("categories"));
    }

    public function create()
    {
        $langs = Lang::where('is_deleted', 0)->get();
        $categories = Category::where('parent_id', 0)->where('is_deleted', 0)->get();
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
            'title.*' => ['required', 'max:255', function ($attribute, $value, $fail) {
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
            'image' => 'nullable|image|mimes:jpg,png,gif,jpeg|max:2024',
        ]);

        $data = $request->all();
        $data['is_active'] = (bool)$request->is_active;
        $data['slug'] = $this->dataService->sluggableArray($data, 'title');
        $data['created_by_user_id'] =  auth()->user()->id;
        $created = Category::create($data);
        if ($created) {
            if ($request->file()) {
                $fileExtension = $request->image->extension();
                $imgName = 'category' . $created->parent_id == 0 ? '_parent' : '' . '_' . time() . rand(0, 999) . '.' . $fileExtension;
                $imgPath = $request->file('image')->storeAs('uploads/admin/categories', $imgName, 'public');
                $created->image = '/storage/' . $imgPath;
                $created->save();
            }
            return redirect()->route("manager.categories.index")
                ->with('type', 'success')
                ->with('message', 'Category has been stored.');
        } else {
            return redirect()->back()
                ->with('type', 'danger')
                ->with('message', 'Failed to store category!');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Category $category)
    {
        $langs = Lang::where('is_deleted', 0)->get();
        $categories = Category::where('parent_id', 0)->where('is_deleted', 0)->get();
        if ($category) {
            return view('admin.categories.edit', compact('langs', 'categories', 'category'));
        } else {
            abort(404);
        }
    }

    public function update(Request $request, Category $category)
    {
        if ($category) {
            $categoryId = $category->id;
            $this->validate($request, [
                'title' => ['required', 'array'],
                'title.*' => ['required', 'max:255', function ($attribute, $value, $fail) use ($categoryId) {
                    $slug = Str::slug($value);
                    $keyValue = Str::of($attribute)->afterLast('.');
                    $existingTitles = Category::where('id', '!=', $categoryId)->whereJsonContains('slug->' . $keyValue, $slug)->exists();
                    if ($existingTitles) {
                        $fail("The $attribute must be unique.");
                    }
                }],
                'image' => 'nullable|image|mimes:jpg,png,gif,jpeg|max:2024',
            ]);

            $data = $request->all();
            $data['is_active'] = (bool)$request->is_active;
            $data['slug'] = $this->dataService->sluggableArray($data, 'title');
            $data['updated_by_user_id'] =  auth()->user()->id;
            $updated = $category->update($data);

            if ($updated) {
                if ($request->file()) {
                    if ($category->image && file_exists(public_path($category->image))) {
                        unlink(public_path($category->image));
                    }
                    $fileExtension = $request->image->extension();
                    $imgName = 'category' . $category->parent_id == 0 ? '_parent' : '' . '_' . time() . rand(0, 999) . '.' . $fileExtension;
                    $imgPath = $request->file('image')->storeAs('uploads/admin/categories', $imgName, 'public');
                    $category->image = '/storage/' . $imgPath;
                    $category->save();
                }
                return redirect()->route("manager.categories.index")
                    ->with('type', 'success')
                    ->with('message', 'Category has been updated.');
            } else {
                return redirect()->back()
                    ->with('type', 'danger')
                    ->with('message', 'Something went wrong!');
            }
        } else {
            abort(404);
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
