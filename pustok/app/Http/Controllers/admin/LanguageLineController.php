<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use Illuminate\Http\Request;
use Spatie\TranslationLoader\LanguageLine;

class LanguageLineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = LanguageLine::all();
        return view('admin.languageLine.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $langs = Lang::all();
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
            'text' => 'required|array',
        ]);
        LanguageLine::create([
            'group' => $request->group,
            'key' => $request->key,
            'text' => $request->text,
        ]);
        return redirect()->route('manager.language_line.index')
            ->with('type', 'success')
            ->with('message', 'Language Line has been stored.');
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
