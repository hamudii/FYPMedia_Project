<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required',
            'posted_at' => 'required|date|after_or_equal:today',
            'description' => 'required|min:100',
            'image' => 'required|file|min:2048',
            'image_source' => 'required',
            'category' => 'required|in:news,blog',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Article::create([
            'author' => $request->author,
            'posted_at' => $request->posted_at,
            'description' => $request->description,
            'image' => $imagePath,
            'image_source' => $request->image_source,
            'category' => $request->category,
        ]);

        return redirect()->route('article.index');
    }

    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'author' => 'required',
            'posted_at' => 'required|date|after_or_equal:today',
            'description' => 'required|min:100',
            'image_source' => 'required',
            'category' => 'required|in:news,blog',
        ]);

        if ($request->file('image')) {
            $request->validate(['image' => 'file|min:2048']);
            $imagePath = $request->file('image')->store('images', 'public');
            $article->image = $imagePath;
        }

        $article->update($request->except('image'));

        return redirect()->route('article.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index');
    }
}

