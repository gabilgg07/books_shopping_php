<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view("admin.users.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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
            return redirect()->route('manage.users.index')->with("type", "success")->with("message", "User creted");
        } else {
            dd("error");
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