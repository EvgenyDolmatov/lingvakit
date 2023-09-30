<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Rubric;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('cms.articles.index', [
            'articles' => Article::all()
        ]);
    }

    public function create()
    {
        return view('cms.articles.create', [
            'rubrics' => Rubric::all()->sortBy("name")
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'rubric_id' => 'required',
            'content' => 'required'
        ]);

        Article::create($request->all());
        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        return view('cms.articles.edit', [
            'article' => $article,
            'rubrics' => Rubric::all()->sortBy("title")
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'rubric_id' => 'required',
            'content' => 'required'
        ]);
        $article->update($request->all());
        return redirect()->route('articles.index');
    }

    public function removeImage(Article $article)
    {
        $article->update(['image' => null]);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return back();
    }
}
