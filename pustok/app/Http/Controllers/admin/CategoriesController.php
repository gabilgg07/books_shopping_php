<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CategoryRequest;
use App\Models\Category as Model;
use App\Models\Lang;
use App\Models\User;
use App\Services\DataService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    protected $table_name = 'categories';
    protected $model_name = 'category';
    public function __construct(private DataService $dataService)
    {
    }

    public function index()
    {
        $models = Model::where('is_deleted', 0)->get();
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
        $select_items = Model::where('parent_id', 0)->where('is_deleted', 0)->where('is_active', 1)->get();
        $create_view_model = [
            'model_name' => $this->model_name,
            'table_name' => $this->table_name,
            'langs' => $langs,
            'select_items' => $select_items,
        ];
        return view('admin.' . $this->table_name . '.create', compact('create_view_model'));
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['is_active'] = $request->is_active ? 1 : 0;
        $data['slug'] = $this->dataService->sluggableArray($data, 'title');
        $data['created_by_user_id'] =  auth()->user()->id;
        $created = Model::create($data);

        if ($created) {
            if ($request->file()) {
                $fileExtension = $request->image->extension();
                $imgName = $this->model_name . ($created->parent_id == 0 ? '_parent' : '') . '_' . time() . sprintf("%03s", rand(0, 999)) . '.' . $fileExtension;
                $imgPath = $request->file('image')->storeAs('uploads/admin/' . $this->table_name, $imgName, 'public');
                $created->image = '/storage/' . $imgPath;
                $created->save();
            }
            return redirect()->route('manager.' . $this->table_name . '.index')
                ->with('type', 'success')
                ->with('message', Str::headline($this->model_name) . ' has been stored.');
        } else {
            return redirect()->back()
                ->with('type', 'danger')
                ->with('message', 'Failed to store ' . $this->model_name . '!');
        }
    }

    public function show(Model $category)
    {
        $model = $category;
        if ($model) {
            $show_view_model = [
                'color_classes' => $this->dataService->colorsArray,
                'model_name' => $this->model_name,
                'model' => $model,
            ];

            if ($model->parent_id != 0) {
                $parentCategory = Model::where('id', $model->parent_id)->first();
                if ($parentCategory) {
                    $show_view_model['parent_category'] = $parentCategory;
                }
            }

            $show_view_model['titles'] = $model->getTranslations('title');
            $show_view_model['slugs'] = $model->getTranslations('slug');
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

    public function edit(Model $category)
    {
        $langs = Lang::where('is_deleted', 0)->where('is_active', 1)->get();
        $select_items = Model::where('parent_id', 0)->where('is_deleted', 0)->where('is_active', 1)->get();
        $model = $category;
        if ($model) {
            $edit_view_model = [
                'model_name' => $this->model_name,
                'table_name' => $this->table_name,
                'model' => $model,
                'langs' => $langs,
                'select_items' => $select_items,
            ];
            $edit_view_model['json_field'] = $model->getTranslations('title');
            return view('admin.' . $this->table_name . '.edit', compact('edit_view_model'));
        } else {
            abort(404);
        }
    }

    public function update(CategoryRequest $request, Model $category)
    {
        $model = $category;
        if ($model) {
            $data = $request->all();
            $data['is_active'] = $request->is_active ? 1 : 0;
            if (!(bool)$request->is_active) {
                if ($model->parent_id == 0) {
                    $childCategories = $model->childCategories;
                    // $childCategories = Model::where('parent_id', $model->id)->get();
                    if ($childCategories->count()) {
                        foreach ($childCategories as $child) {
                            $child->is_active = false;
                            $child->updated_by_user_id =  auth()->user()->id;
                            $child->updated_at = now();
                            $childSaved = $child->save();
                            if (!$childSaved) {
                                return redirect()->back()
                                    ->with('type', 'danger')
                                    ->with('message', "Failed to change is_active field of child $this->model_name id:$child->id!");
                            } else {
                                $books = $child->books;
                                foreach ($books as $book) {
                                    $book->is_active = false;
                                    $book->updated_by_user_id =  auth()->user()->id;
                                    $bookSaved = $book->save();
                                    if (!$bookSaved) {
                                        return redirect()->back()
                                            ->with('type', 'danger')
                                            ->with('message', "Failed to change is_active field of child $this->model_name id:$child->id's book id:$book->id !");
                                    }
                                }
                            }
                        }
                    }
                } else {
                    $books = $model->books;
                    foreach ($books as $book) {
                        $book->is_active = false;
                        $book->updated_by_user_id =  auth()->user()->id;
                        $bookSaved = $book->save();
                        if (!$bookSaved) {
                            return redirect()->back()
                                ->with('type', 'danger')
                                ->with('message', "Failed to change is_active field of child $this->model_name id:$model->id's book id:$book->id !");
                        }
                    }
                }
            }
            if ($model->parent_id != 0 && (bool)$request->is_active) {
                $parentModel = $model->parentCategory;
                // $parentModel = Model::where('id', $model->parent_id)->first();
                if (!$parentModel->is_active) {
                    $route = route('manager.' . $this->table_name . '.edit', $parentModel->id);
                    $goHref = "<a href='$route'>Do active id $parentModel->id parent $this->model_name</a>";
                    return redirect()->back()
                        ->with('type', 'danger')
                        ->with('message', "Failed to do active $this->model_name! Please, first do active parent $this->model_name: $goHref");
                }
            }
            $data['slug'] = $this->dataService->sluggableArray($data, 'title');
            $data['updated_by_user_id'] =  auth()->user()->id;
            $updated = $model->update($data);

            if ($updated) {
                if ($request->file()) {
                    if ($model->image && file_exists(public_path($model->image))) {
                        unlink(public_path($model->image));
                    }
                    $fileExtension = $request->image->extension();
                    $imgName = $this->model_name . ($model->parent_id == 0 ? '_parent' : '') . '_' . time() . sprintf("%03s", rand(0, 999)) . '.' . $fileExtension;
                    $imgPath = $request->file('image')->storeAs('uploads/admin/' . $this->table_name, $imgName, 'public');
                    $model->image = '/storage/' . $imgPath;
                    $model->save();
                }
                return redirect()->route('manager.' . $this->table_name . '.index')
                    ->with('type', 'success')
                    ->with('message', Str::headline($this->model_name) . ' has been updated.');
            } else {
                return redirect()->back()
                    ->with('type', 'danger')->with('message', 'Failed to update ' . $this->model_name . '!');
            }
        } else {
            abort(404);
        }
    }

    public function change_active(Request $request)
    {
        $id = $request->id;
        $is_active = $request->is_active === 'true' ? 1 : 0;
        $model = Model::where('id', $id)->first();
        $childrenIds = [];
        try {
            if (!$is_active) {
                if ($model->parent_id == 0) {
                    $childCategories = Model::where('parent_id', $model->id)->get();
                    if (count($childCategories)) {
                        foreach ($childCategories as $child) {
                            $child->is_active = false;
                            $child->updated_by_user_id =  auth()->user()->id;
                            $childSaved = $child->save();
                            if (!$childSaved) {
                                return json_encode([
                                    'type' => 'danger',
                                    'message' => 'Failed to change is_active field of child ' . $this->model_name . ' model, id: ' . $id,
                                ]);
                            } else {
                                $books = $child->books;
                                foreach ($books as $book) {
                                    $book->is_active = false;
                                    $book->updated_by_user_id =  auth()->user()->id;
                                    $bookSaved = $book->save();
                                    if (!$bookSaved) {
                                        return json_encode([
                                            'type' => 'danger',
                                            'message' => "Failed to change is_active field of child $this->model_name id:$child->id's book id:$book->id !",
                                        ]);
                                    }
                                }
                            }
                            $childrenIds[] = $child->id;
                        }
                    }
                } else {
                    $books = $model->books;
                    foreach ($books as $book) {
                        $book->is_active = false;
                        $book->updated_by_user_id =  auth()->user()->id;
                        $bookSaved = $book->save();
                        if (!$bookSaved) {
                            return json_encode([
                                'type' => 'danger',
                                'message' => "Failed to change is_active field of child $this->model_name id:$model->id's book id:$book->id !",
                            ]);
                        }
                    }
                }
            }
            if ($model->parent_id != 0) {
                $parentModel = Model::where('id', $model->parent_id)->first();
                if ($parentModel && !$parentModel->is_active) {
                    $route = route('manager.' . $this->table_name . '.edit', $parentModel->id);
                    $goHref = "<a href='$route'> do active parent $this->model_name, id: $parentModel->id</a>";
                    return json_encode([
                        'type' => 'danger',
                        'message' => 'Failed to do active ' . $this->model_name . ' model! Please, first: ' . $goHref,
                    ]);
                }
            }
            $updated = Model::where('id', $id)->update([
                'is_active' => $is_active,
                'updated_by_user_id' => auth()->user()->id,
            ]);

            if ($updated) {
                $data = [
                    'type' => 'success',
                    'message' => Str::headline($this->model_name) . ' model\'s is active field changed, id: ' . $id,
                ];
                if ($childrenIds && count($childrenIds)) {
                    $data['ids'] = $childrenIds;
                }
                return json_encode($data);
            } else {
                return json_encode([
                    'type' => 'danger',
                    'message' => 'Failed to change is active field of ' . $this->model_name . ' model, id: ' . $id,
                ]);
            }
        } catch (\Throwable $th) {
            return 'error: ' . $th;
        }
    }

    public function destroy(Model $category)
    {
        $model = $category;
        if ($model) {
            $model->is_deleted = 1;
            $model->deleted_by_user_id = auth()->user()->id;
            $model->deleted_at = now();
            if ($model->parent_id == 0) {
                $childModels = Model::where('parent_id', $model->id)->where('is_deleted', 0)->get();
                if ($childModels && $childModels->count()) {
                    foreach ($childModels as $child) {
                        $child->is_deleted = 1;
                        $child->deleted_by_user_id =  auth()->user()->id;
                        $child->deleted_at = now();
                        $childSaved = $child->save();
                        if (!$childSaved) {
                            return redirect()->back()
                                ->with('type', 'danger')
                                ->with('message', "Failed to delete child $this->model_name id:$child->id !");
                        }
                    }
                }
            }
            $saved = $model->save();
            if ($saved) {
                return redirect()->route('manager.' . $this->table_name . '.index')
                    ->with('type', 'success')
                    ->with('message', Str::headline($this->model_name) . ' has been deleted.');
            } else {
                return redirect()->back()
                    ->with('type', 'danger')
                    ->with('message', 'Failed to delete ' . $this->model_name . '!');
            }
        } else {
            abort(404);
        }
    }

    public function deleteds()
    {
        $models = Model::where('is_deleted', 1)->get();
        $deleteds_view_model = [
            'model_name' => $this->model_name,
            'table_name' => $this->table_name,
            'models' => $models,
        ];
        return view('admin.' . $this->table_name . '.deleteds', compact("deleteds_view_model"));
    }

    public function restore(Model $category)
    {
        $model = $category;
        if ($model) {
            if ($model->parent_id) {
                $parentModel = Model::where('id', $model->parent_id)->first();
                if ($parentModel->is_deleted) {
                    $route = route('manager.' . $this->table_name . '.restore', $parentModel->id);
                    $goHref = "<a href='$route'> Restore id $parentModel->id parent $this->model_name</a>";
                    return redirect()->back()
                        ->with('type', 'danger')
                        ->with('message', "Failed to restore $this->model_name! Please, first restore parent $this->model_name: $goHref");
                }
            }
            $model->is_deleted = 0;
            $model->deleted_by_user_id =  0;
            $model->deleted_at = null;
            $model->updated_by_user_id = auth()->user()->id;
            $updated = $model->update();

            if ($updated) {
                return redirect()->route('manager.' . $this->table_name . '.deleteds')
                    ->with('type', 'success')
                    ->with('message', Str::headline($this->model_name) . ' has been restored.');
            } else {
                return redirect()->back()
                    ->with('type', 'danger')
                    ->with('message', 'Failed to restore ' . $this->model_name . '!');
            }
        } else {
            abort(404);
        }
    }

    public function permanently_delete(Model $category)
    {
        $model = $category;
        if ($model) {
            if ($model->parent_id == 0) {
                $childModels = $model->childCategories;
                if ($childModels && $childModels->count()) {
                    foreach ($childModels as $child) {
                        // if ($child->image && file_exists(public_path($child->image))) {
                        //     unlink(public_path($child->image));
                        // }
                        // $childDeleted = $child->delete();
                        // if (!$childDeleted) {
                        //     return redirect()->back()
                        //         ->with('type', 'danger')
                        //         ->with('message', "Failed to permanently delete child $this->model_name id:$child->id !");
                        // }
                        $child->is_deleted = 1;
                        $child->is_active = 0;
                        $child->deleted_at = now();
                        $child->deleted_by_user_id = auth()->user()->id;
                        $child->save();

                        $books = $child->books;
                        if ($books && $books->count()) {
                            foreach ($books as $book) {
                                $book->is_deleted = 1;
                                $book->is_active = 0;
                                $book->deleted_at = now();
                                $book->deleted_by_user_id = auth()->user()->id;
                                $book->save();
                            }
                        }
                    }
                }
            } else {
                $books = $model->books;
                if ($books && $books->count()) {
                    foreach ($books as $book) {
                        $book->is_deleted = 1;
                        $book->is_active = 0;
                        $book->deleted_at = now();
                        $book->deleted_by_user_id = auth()->user()->id;
                        $book->save();
                    }
                }
            }
            if ($model->image && file_exists(public_path($model->image))) {
                unlink(public_path($model->image));
            }
            $deleted = $model->delete();
            if ($deleted) {
                return redirect()->route('manager.' . $this->table_name . '.deleteds')
                    ->with('type', 'success')
                    ->with('message', Str::headline($this->model_name) . ' has been permanently deleted!');
            } else {
                return redirect()->back()
                    ->with('type', 'danger')
                    ->with('message', 'Failed to permanently deleted ' . $this->model_name . '!');
            }
        } else {
            abort(404);
        }
    }
}
