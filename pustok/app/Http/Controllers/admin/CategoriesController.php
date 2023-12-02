<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\DataService;
use Illuminate\Http\Request;

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
        $categories = Category::where('parent_id', 0)->get();
        return view("admin.categories.create", compact("categories"));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['status'] = (bool)$request->status;
        $data['slug'] = $this->dataService->sluggableArray($data, 'title');
        $created = Category::create($data);
        if ($created) {
            return redirect()->route("admin.categories.index")->with('success', 'Category added succesfully');
        } else {
            dd('error');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        dd($id);
    }
}
