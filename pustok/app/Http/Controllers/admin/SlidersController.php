<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider as Model;
use App\Models\Lang;
use App\Models\User;
use App\Services\DataService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SlidersController extends Controller
{
    protected $table_name = 'sliders';
    protected $model_name = 'slider';
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
        $create_view_model = [
            'model_name' => $this->model_name,
            'table_name' => $this->table_name,
            'langs' => $langs,
        ];
        return view('admin.' . $this->table_name . '.create', compact('create_view_model'));
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'text_content' => 'required|array',
            'text_content.*' => 'required',
            'image' => 'required|image|mimes:jpg,png,gif,jpeg,svg,webp|max:2024',
        ], [
            'image.required' => 'Image ' . __('validation.required')
        ]);
        $data = $request->all();
        $data['is_active'] = $request->is_active ? 1 : 0;
        $data['created_by_user_id'] =  auth()->user()->id;
        $created = Model::create($data);

        if ($created) {
            if ($request->file()) {
                $fileExtension = $request->image->extension();
                $imgName = $this->model_name . '_' . time() . sprintf("%03s", rand(0, 999)) . '.' . $fileExtension;
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

    public function show(Model $slider)
    {
        $model = $slider;
        if ($model) {
            $show_view_model = [
                'color_classes' => $this->dataService->colorsArray,
                'model_name' => $this->model_name,
                'model' => $model,
            ];

            $show_view_model['text_contents'] = $model->getTranslations('text_content');
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

    public function edit(Model $slider)
    {
        $langs = Lang::where('is_deleted', 0)->where('is_active', 1)->get();
        $model = $slider;
        if ($model) {
            $edit_view_model = [
                'model_name' => $this->model_name,
                'table_name' => $this->table_name,
                'model' => $model,
                'langs' => $langs,
            ];
            $edit_view_model['json_field'] = $model->getTranslations('text_content');
            return view('admin.' . $this->table_name . '.edit', compact('edit_view_model'));
        } else {
            abort(404);
        }
    }

    public function update(Request $request, Model $slider)
    {
        $validation = $request->validate([
            'text_content' => 'required|array',
            'text_content.*' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,gif,jpeg,svg,webp|max:2024',
        ]);
        $model = $slider;
        if ($model) {
            $data = $request->all();
            $data['is_active'] = $request->is_active ? 1 : 0;
            $data['updated_by_user_id'] =  auth()->user()->id;
            $updated = $model->update($data);

            if ($updated) {
                if ($request->file()) {
                    if ($model->image && file_exists(public_path($model->image))) {
                        unlink(public_path($model->image));
                    }
                    $fileExtension = $request->image->extension();
                    $imgName = $this->model_name . '_' . time() . sprintf("%03s", rand(0, 999)) . '.' . $fileExtension;
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
        try {
            $updated = Model::where('id', $id)->update([
                'is_active' => $is_active
            ]);

            if ($updated) {
                $data = [
                    'type' => 'success',
                    'message' => Str::headline($this->model_name) . ' model\'s is active field changed, id: ' . $id,
                ];
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

    public function destroy(Model $slider)
    {
        $model = $slider;
        if ($model) {
            $model->is_deleted = 1;
            $model->deleted_by_user_id =  auth()->user()->id;
            $model->deleted_at = now();
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
    public function restore(Model $slider)
    {
        $model = $slider;
        if ($model) {
            $model->is_deleted = 0;
            $model->deleted_by_user_id =  0;
            $model->deleted_at = null;
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

    public function permanently_delete(Model $slider)
    {
        $model = $slider;
        if ($model) {
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