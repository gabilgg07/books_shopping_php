<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\BookRequest;
use App\Models\Book as Model;
use App\Models\BookImage;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Lang;
use App\Models\User;
use App\Services\DataService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BooksController extends Controller
{
    protected $table_name = 'books';
    protected $model_name = 'book';
    public function __construct(private DataService $dataService)
    {
    }

    public function index()
    {
        $models = Model::with('bookImages')
            ->where('is_deleted', 0)
            ->get();
        $index_view_model = [
            'model_name' => $this->model_name,
            'table_name' => $this->table_name,
            'models' => $models,
        ];
        return view('admin.' . $this->table_name . '.index', compact('index_view_model'));
    }

    public function create()
    {
        $langs = Lang::where('is_deleted', 0)->where('is_active', 1)->get();
        $categories = Category::where('is_deleted', 0)->where('is_active', 1)->get();
        $campaigns = Campaign::where('is_deleted', 0)->where('is_active', 1)->get();
        $create_view_model = [
            'model_name' => $this->model_name,
            'table_name' => $this->table_name,
            'langs' => $langs,
            'categories' => $categories,
            'campaigns' => $campaigns,
        ];
        return view('admin.' . $this->table_name . '.create', compact('create_view_model'));
    }

    public function store(BookRequest $request)
    {
        $data = $request->all();
        $data['is_active'] = $request->is_active ? 1 : 0;
        $data['slug'] = $this->dataService->sluggableArray($data, 'title');
        $data['created_by_user_id'] =  auth()->user()->id;
        $created = Model::create($data);

        if ($created) {
            return redirect()->route('manager.' . $this->table_name . '.index')
                ->with('type', 'success')
                ->with('message', Str::headline($this->model_name) . ' has been stored.');
        } else {
            return redirect()->back()
                ->with('type', 'danger')
                ->with('message', 'Failed to store ' . $this->model_name . '!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}