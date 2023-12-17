<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use Illuminate\Http\Request;

class LangsController extends Controller
{

    public function index()
    {
        $langs = Lang::where('is_deleted', 0)->get();
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
        $data['is_active'] =  $request->is_active ? 1 : 0;
        $data['created_by_user_id'] =  auth()->user()->id;
        $created = Lang::create($data);
        if ($created) {
            if ($request->file()) {
                $fileExtension = $request->image->extension();
                $imgName = 'flag_' . $created->code . '_' . time() . rand(0, 999) . '.' . $fileExtension;
                $imgPath = $request->file('image')->storeAs('uploads/admin/langs_flag', $imgName, 'public');
                $created->image = '/storage/' . $imgPath;
                $created->save();
            }
            return redirect()->route("manager.langs.index")
                ->with('type', 'success')
                ->with('message', 'Language has been stored.');
        } else {
            return back()
                ->with('type', 'danger')
                ->with('message', 'Failed to store language!');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Lang $lang)
    {
        return view('admin.langs.edit', compact('lang'));
    }

    public function update(Request $request, Lang $lang)
    {
        $request->validate([
            'code' => 'required|max:3',
            'country' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,gif,jpeg|max:2024',
        ]);

        $data = $request->all();
        $data['is_active'] =  $request->is_active ? 1 : 0;
        $data['updated_by_user_id'] =  auth()->user()->id;
        $updated = $lang->update($data);

        if ($updated) {
            if ($request->file()) {
                if ($lang->image && file_exists(public_path($lang->image))) {
                    unlink(public_path($lang->image));
                }
                $fileExtension = $request->image->extension();
                $imgName = 'flag_' . $lang->code . '_' . time() . rand(0, 999) . '.' . $fileExtension;
                $imgPath = $request->file('image')->storeAs('uploads/admin/langs_flag', $imgName, 'public');
                $lang->image = '/storage/' . $imgPath;
                $lang->save();
            }
            return redirect()->route("manager.langs.index")
                ->with('type', 'success')
                ->with('message', 'Language has been updated.');
        } else {
            return redirect()->back()
                ->with('type', 'danger')
                ->with('message', 'Failed to update language!');
        }
    }

    public function destroy(Lang $lang)
    {
        // dd(strtotime(date('m/d/Y h:i:s a', time())));
        $lang->is_deleted = 1;
        $lang->deleted_by_user_id =  auth()->user()->id;
        $lang->deleted_at = now();
        $saved = $lang->save();

        if ($saved) {
            return redirect()->route("manager.langs.index")
                ->with('type', 'success')
                ->with('message', 'Language has been deleted.');
        } else {
            return redirect()->back()
                ->with('type', 'danger')
                ->with('message', 'Failed to delete language!');
        }
    }
}
