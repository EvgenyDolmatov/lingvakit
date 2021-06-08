<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LMS\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        return view('cms.languages.index', [
            'languages' => Language::all()
        ]);
    }

    public function create()
    {
        return view('cms.languages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Language::create($request->all());

        return redirect()->route('languages.index');
    }

    public function edit(Language $language)
    {
        return view('cms.languages.edit', ['language' => $language]);
    }

    public function update(Request $request, Language $language)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $language->update($request->all());
        return redirect()->route('languages.index');
    }

    public function destroy(Language $language)
    {
        $language->delete();
        return redirect()->route('languages.index');
    }
}
