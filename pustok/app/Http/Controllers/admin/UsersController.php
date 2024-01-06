<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\UserRequest;
use App\Models\User as Model;
use App\Models\User;
use App\Services\DataService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    protected $table_name = 'users';
    protected $model_name = 'user';
    public function __construct(private DataService $dataService)
    {
    }
    public function index()
    {
        $models = Model::where('id', '!=', auth()->user()->id)->where('is_deleted', 0)->get();
        $index_view_model = [
            'model_name' => $this->model_name,
            'table_name' => $this->table_name,
            'models' => $models,
        ];
        return view('admin.' . $this->table_name . '.index', compact('index_view_model'));
    }

    public function create()
    {
        $create_view_model = [
            'model_name' => $this->model_name,
            'table_name' => $this->table_name,
        ];
        return view('admin.' . $this->table_name . '.create', compact('create_view_model'));
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();
        unset($data['repeat_password']);
        $data['is_admin'] =  $request->is_admin ? 1 : 0;
        $data['is_active'] =  $request->is_active ? 1 : 0;
        $data['created_by_user_id'] =  auth()->user()->id;
        $created = Model::create($data);
        if ($created) {
            if ($request->file()) {
                $fileExtension = $request->image->extension();
                $imgName = $this->model_name . '_' . $created->code . '_' . time() . sprintf("%03s", rand(0, 999)) . '.' . $fileExtension;
                $imgPath = $request->file('image')->storeAs('uploads/admin/' . $this->table_name, $imgName, 'public');
                $created->image = '/storage/' . $imgPath;
                $created->save();
            }
            return redirect()->route('manager.' . $this->table_name . '.index')
                ->with('type', 'success')
                ->with('message', Str::headline($this->model_name) . ' has been stored.');
        } else {
            return back()
                ->with('type', 'danger')
                ->with('message', 'Failed to store ' . $this->model_name . '!');
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

    public function destroy(User $user)
    {
        dd($user);
        $deleted = $user->delete();

        if ($deleted) {
            return redirect()->route("manager.categories.index")
                ->with('type', 'success')
                ->with('message', 'User has been deleted.');
        } else {
            return redirect()->back()
                ->with('type', 'danger')
                ->with('message', 'Failed to delete user!');
        }
    }
}
