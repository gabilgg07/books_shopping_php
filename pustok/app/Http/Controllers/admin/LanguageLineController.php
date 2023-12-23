<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use App\Models\User;
use App\Services\DataService;
use Illuminate\Http\Request;
use Spatie\TranslationLoader\LanguageLine;

class LanguageLineController extends Controller
{

    public function __construct(private DataService $dataService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = LanguageLine::where('is_deleted', 0)->get();
        return view('admin.languageLine.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $langs = Lang::where('is_deleted', 0)->get();
        return view('admin.languageLine.create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'group' => 'required',
            'key' => 'required',
            'text' => ['required', 'array'],
            'text.*' => ['required', 'max:255'],
        ], []);

        $data = $request->all();
        $data['is_active'] = (bool)$request->is_active;
        $data['created_by_user_id'] =  auth()->user()->id;
        $created = LanguageLine::create($data);

        if ($created) {
            return redirect()->route('manager.language_line.index')
                ->with('type', 'success')
                ->with('message', 'Language Line has been stored.');
        } else {
            return redirect()->back()
                ->with('type', 'danger')
                ->with('message', 'Failed to store language line!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LanguageLine $languageLine)
    {
        $model = $languageLine;
        $show_view_model = [
            'colorClasses' => $this->dataService->colorsArray,
            'model' => $model,
        ];

        $show_view_model['texts'] = $model->getTranslations('text');
        if ($model->created_by_user_id) {
            $created_by_user = User::where('id', $model->created_by_user_id)->first();
            if ($created_by_user) {
                $show_view_model['created_by_user'] = $created_by_user;
            }

            if ($model->updated_by_user_id && $model->updated_by_user_id !== $model->created_by_user_id) {
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

        return view('admin.categories.show', compact('show_view_model'));
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
