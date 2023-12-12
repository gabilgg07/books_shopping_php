<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view("admin.users.index", compact('data'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            "first_name" => "required",
            "last_name" => "required",
            "email" => ["required", "email"],
            "password" => "required",
        ]);

        $data = $request->all();
        $data['is_admin'] =  $request->is_admin ? 1 : 0;
        $data['is_deleted'] =  $request->is_deleted ? 1 : 0;
        $created = User::create($data);

        if ($created) {
            return redirect()->route('manager.users.index')->with("type", "success")->with("message", "User creted");
        } else {
            dd("error");
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
        //
    }
}