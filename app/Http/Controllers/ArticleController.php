<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Saya ambil 10 data yang terbaru dari Model Article
        // Article ambil dari database sesuai ENV dan pilih table articles
        $articles = Article::latest()->paginate(10);

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'excerpt' => 'nullable|max:255',
            'content' => 'required',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request
                ->file('thumbnail')
                ->store('articles', 'public');
        }

        $validated['slug'] = Str::slug($validated['title']);

        // Proses menyimpan ke database
        Article::create($validated);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'excerpt' => 'nullable|max:255',
            'content' => 'required',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request
                ->file('thumbnail')
                ->store('articles', 'public');
        }

        $validated['slug'] = Str::slug($validated['title']);

        $article->update($validated);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Article deleted successfully.');
    }
}
