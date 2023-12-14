<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        return view('admin.account.index');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'phone' => 'nullable|min:13',
            'image' => 'nullable|image|mimes:jpg,png,gif,jpeg|max:2024',
        ]);

        try {
            DB::beginTransaction();
            $id = Auth::user()->id;
            $user = User::find($id);
            if ($request->file()) {
                if ($user->image && file_exists(public_path($user->image))) {
                    unlink(public_path($user->image));
                }

                $fileExtension = $request->image->extension();
                $imgName = 'account_profil_' . time() . rand(0, 999) . '.' . $fileExtension;
                $imgPath = $request->file('image')->storeAs('uploads/admin', $imgName, 'public');
                $user->image = '/storage/' . $imgPath;
            }
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            if ($request->phone) {
                $user->phone = $request->phone;
            }

            $user->save();
            DB::commit();
            return redirect()->route('manager.account.index')->with('type', 'success')->with('message', 'Your account has been updated!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('manager.account.index')->with('type', 'danger')->with('message', 'Something went wrong!');
        }
    }

    public function changePassword(Request $request)
    {

        $this->validate($request, [
            'new_password' => 'required',
            'repeat_new_password' => 'required|same:new_password',
        ]);


        try {
            DB::beginTransaction();
            $id = Auth::user()->id;
            $user = User::find($id);
            $user->password = Hash::make($request->new_password);
            $user->save();
            DB::commit();
            return redirect()->route('manager.account.index')->with('type', 'success')->with('message', 'Your password has been updated!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('manager.account.index')->with('type', 'danger')->with('message', 'Something went wrong!');
        }

        dd($request->all());
    }
}
