<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use Illuminate\Http\Request;

class LangsController extends Controller
{
    public function index()
    {
        $langs = Lang::all();
        return view('admin.langs.index', compact('langs'));
    }

    public function create()
    {
        return view('admin.langs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|max:3',
            'country' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,gif,jpeg|max:2024',
        ]);

        $data = $request->all();
        $data['is_deleted'] =  $request->is_deleted ? 1 : 0;
        $data['deleted_by_user_id'] =  auth()->user()->id;
        unset($data['_token']);
        // dd($data);
        $created = Lang::create($data);
        if ($created) {
            if ($request->file()) {
                $fileExtension = $request->image->extension();
                $imgName = 'lang_' . $created->code . '_' . time() . rand(0, 999) . '.' . $fileExtension;
                $imgPath = $request->file('image')->storeAs('uploads/admin/langs', $imgName, 'public');
                $created->image = '/storage/' . $imgPath;
                $created->save();
            }
            return redirect()->route("manager.langs.index")
                ->with('type', 'success')
                ->with('message', 'Language has been stored.');
        } else {
            return back()
                ->with('type', 'danger')
                ->with('message', 'Something went wrong!');
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
