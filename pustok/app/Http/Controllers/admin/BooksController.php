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

    public function store(Request $request)
    {
        $data = $request->all();

        $validation = $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpg,png,gif,jpeg,svg,webp|max:2024',
            'is_main' => 'required'
        ], [
            'images.required' => 'Images ' . __('validation.required'),
            'images.*.image' => 'Image ' . __('validation.image'),
            'images.*.mimes' => __('validation.mimes', ['attribute' => 'image', 'values' => 'jpg, png, gif, jpeg, svg, webp']),
            '*.uploaded' => __('validation.uploaded') . ' 2 Mb',
            'is_main.required' => 'Main image ' . __('validation.required'),
        ]);

        dd($data);
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


    public function show(Model $book)
    {
        $model = $book;
        if ($model) {
            $show_view_model = [
                'color_classes' => $this->dataService->colorsArray,
                'model_name' => $this->model_name,
                'model' => $model,
            ];

            $show_view_model['titles'] = $model->getTranslations('title');
            $show_view_model['slugs'] = $model->getTranslations('slug');
            $show_view_model['short_descs'] = $model->getTranslations('short_desc');
            $show_view_model['long_descs'] = $model->getTranslations('long_desc');
            if ($model->created_by_user_id) {
                $created_by_user = User::where('id', $model->created_by_user_id)->first();
                if ($created_by_user) {
                    $show_view_model['created_by_user'] = $created_by_user;
                }

                if ($model->updated_by_user_id && $model->updated_at !== $model->created_at && !$model->is_deleted) {
                    $updated_by_user = User::where('id', $model->updated_by_user_id)->first();
                    if ($updated_by_user) {
                        $show_view_model['updated_by_user'] = $updated_by_user;
                    }
                }
            }
            if ($model->deleted_by_user_id) {
                $deleted_by_user = User::where('id', $model->deleted_by_user_id)->first();
                if ($deleted_by_user) {
                    $show_view_model['deleted_by_user'] = $deleted_by_user;
                }
            }

            return view('admin.' . $this->table_name . '.show', compact('show_view_model'));
        } else {
            abort(404);
        }
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