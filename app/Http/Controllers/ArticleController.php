<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    // Show form to create a new article
    public function create()
    {
        return view('articles.create');
    }

    // Store a new article in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'author_id' => auth()->id(),
        ]);

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    // Show a specific article
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    // Show form to edit an article
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    // Update an existing article in the database
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $article->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }

    // Delete an article
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
