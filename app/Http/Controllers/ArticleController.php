<?php

namespace App\Http\Controllers;

use App\Models\Article;
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
        $validated = $request->validate([
            'author' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string',
            'tags' => 'nullable|string',
        ]);

        Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'author_id' => auth()->id(),
        ]);

        return redirect()->route('articles.create')->with('success', 'Article created successfully.');
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
