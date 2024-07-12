<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $articles = Article::query()
            ->with(['categories', 'images'])
            ->where('is_published', true)
            ->paginate(3);

        return view('home', [
            'articles' => $articles,
        ]);
    }
}
