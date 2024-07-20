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
            'title' => $request->get('title'),
            'slug' => Str::slug($request->get('title')),
            'content' => $request->get('content'),
            'is_published' => $request->get('is_published') === 'on',
        ]);

        $article->categories()->attach($request->get('categories'));

        // Upload images to S3
        $images  = S3Service::uploadFile('media', $request->file('images'));

        Image::create([
            'article_id' => $article->id,
            'path' => $images,
        ]);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article crée avec succès');
    }

    public function edit($id): View
    {
        return view('admin.articles.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function deleteImage($id)
    {
        // Delete image from S3 and table article

        return redirect()->back()
            ->with('success', 'Image supprimée avec succès');
    }
}
