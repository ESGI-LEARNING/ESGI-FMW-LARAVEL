<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminArticleStoreRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Image;
use App\Services\S3Service\S3Service;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminArticleController extends Controller
{
    public function index(): View
    {
        return view('admin.articles.index');
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('admin.articles.create', compact('categories'));
    }

    public function store(AdminArticleStoreRequest $request)
    {
        $article = Article::create([
            'title'        => $request->get('title'),
            'slug'         => Str::slug($request->get('title')),
            'description'  => $request->get('description'),
            'content'      => $request->get('content'),
            'is_published' => $request->boolean('is_online'),
        ]);

        $article->categories()->attach($request->get('categories'));
        $images = S3Service::uploadFile('media', $request->file('images'));

        foreach ($images as $image) {
            Image::create([
                'article_id' => $article->id,
                'path'       => $image,
            ]);
        }

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article crée avec succès');
    }

    public function edit(string $slug): View
    {
        $article = Article::query()
            ->with('categories', 'images')
            ->where('slug', $slug)
            ->firstOrFail();

        $categories = Category::all();

        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(AdminArticleStoreRequest $request, string $slug)
    {
        $article = Article::query()->where('slug', $slug)->firstOrFail();

        $article->update([
            'title'        => $request->get('title'),
            'slug'         => Str::slug($request->get('title')),
            'description'  => $request->get('description'),
            'content'      => $request->get('content'),
            'is_published' => $request->boolean('is_online'),
        ]);

        $article->categories()->sync($request->get('categories'));

        if ($request->hasFile('images')) {
            $images = S3Service::uploadFile('media', $request->file('images'));

            foreach ($images as $image) {
                Image::create([
                    'article_id' => $article->id,
                    'path'       => $image,
                ]);
            }
        }

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article modifié avec succès');
    }
}
