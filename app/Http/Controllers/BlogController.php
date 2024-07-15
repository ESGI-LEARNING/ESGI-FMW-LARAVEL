<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $articles = Article::query()
            ->with(['categories', 'images'])
            ->where('is_published', true)
            ->paginate(12);

        return view('blog.index', compact('articles'));
    }

    public function show(Article $article): View
    {
        $article = Article::query()
            ->with(['categories', 'images'])
            ->where('is_published', true)
            ->findOrFail($article->id);

        return view('blog.show', compact('article'));
    }
}
