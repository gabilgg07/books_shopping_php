<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use App\Models\User;
use App\Services\DataService;
use Illuminate\Http\Request;
use Spatie\TranslationLoader\LanguageLine as Model;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class LanguageLineController extends Controller
{

    protected $table_name = 'language_line';
    protected $model_name = 'language_line';
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
        $langs = Lang::where('is_deleted', 0)->get();
        $create_view_model = [
            'model_name' => $this->model_name,
            'table_name' => $this->table_name,
            'langs' => $langs,
        ];
        return view('admin.' . $this->table_name . '.create', compact('create_view_model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'group' => 'required',
            'key' => 'required',
            'text' => ['required', 'array'],
            'text.*' => ['required', 'max:255'],
        ], [
            'group.required' => 'Group ' . __('validation.required'),
            'key.required' => 'Key ' . __('validation.required'),
            'text.*.required' => 'Text ' . __('validation.required'),
        ]);

        $data = $request->all();
        $data['is_active'] = $request->is_active ? 1 : 0;
        $data['created_by_user_id'] =  auth()->user()->id;
        $created = Model::create($data);

        if ($created) {
            return redirect()->route('manager.' . $this->table_name . '.index')
                ->with('type', 'success')
                ->with('message', Str::headline($this->model_name) . ' has been stored.');
        } else {
            return back()
                ->with('type', 'danger')
                ->with('message', 'Failed to store ' . $this->model_name . '!');
        }
    }

    public function show(Model $languageLine)
    {
        $model = $languageLine;
        $show_view_model = [
            'color_classes' => $this->dataService->colorsArray,
            'model_name' => $this->model_name,
            'model' => $model,
        ];

        $show_view_model['texts'] = $model->text;
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
    }

    public function edit(Model $languageLine)
    {
        $langs = Lang::where('is_deleted', 0)->get();
        $model = $languageLine;
        if ($model) {
            $edit_view_model = [
                'model_name' => $this->model_name,
                'table_name' => $this->table_name,
                'model' => $model,
                'langs' => $langs,
            ];
            return view('admin.' . $this->table_name . '.edit', compact('edit_view_model'));
        } else {
            abort(404);
        }
    }

    public function update(Request $request, Model $languageLine)
    {
        $model = $languageLine;
        if ($model) {
            $request->validate([
                'group' => 'required',
                'key' => 'required',
                'text' => ['required', 'array'],
                'text.*' => ['required', 'max:255'],
            ], [
                'group.required' => 'Group ' . __('validation.required'),
                'key.required' => 'Key ' . __('validation.required'),
                'text.*.required' => 'Text ' . __('validation.required'),
            ]);

            $data = $request->all();
            $data['is_active'] =  $request->is_active ? 1 : 0;
            $data['updated_by_user_id'] =  auth()->user()->id;
            $updated = $model->update($data);
            if ($updated) {
                return redirect()->route('manager.' . $this->table_name . '.index')
                    ->with('type', 'success')
                    ->with('message', Str::headline($this->model_name) . ' has been updated.');
            } else {
                return redirect()->back()
                    ->with('type', 'danger')
                    ->with('message', 'Failed to update ' . $this->model_name . '!');
            }
        } else {
            abort(404);
        }
    }

    public function destroy(Model $languageLine)
    {
        $model = $languageLine;
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

    public function restore(Model $languageLine)
    {
        $model = $languageLine;
        if ($model) {
            $model->is_deleted = 0;
            $model->deleted_by_user_id =  0;
            $model->deleted_at = null;
            $updated = $model->update();

            if ($updated) {
                return redirect()->route('manager.' . $this->table_name . '.index')
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

    public function permanently_delete(Model $languageLine)
    {
        $model = $languageLine;
        if ($model) {
            $deleted = $model->delete();
            if ($deleted) {
                return redirect()->route('manager.' . $this->table_name . '.index')
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
