<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LMS\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $uncategorized = Category::where('name', 'Uncategorized')->first();
        return view('cms.categories.index', [
            'categories' => Category::all()->except($uncategorized->id)
        ]);
    }

    public function create()
    {
        return view('cms.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::create($request->all());
        $category->uploadImage($request->file('image'));

        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('cms.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $category->update($request->all());
        $category->uploadImage($request->file('image'));
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->remove();
        return back();
    }
}
