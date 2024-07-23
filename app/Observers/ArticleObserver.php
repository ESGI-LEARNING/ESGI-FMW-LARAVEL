<?php

namespace App\Observers;

use App\Jobs\GenerateSitemap;
use App\Models\Article;

class ArticleObserver
{
    /**
     * Handle the Article "created" event.
     */
    public function created(Article $article): void
    {
        if ($article->is_published) {
            $article->published_at = now();
            $article->save();

            // Generate Sitemap
            GenerateSitemap::dispatch();
        }
    }

    /**
     * Handle the Article "updated" event.
     */
    public function updated(Article $article): void
    {
        if ($article->is_published && $article->published_at === null) {
            $article->published_at = now();
            $article->save();

            GenerateSitemap::dispatch();
        }
    }

    /**
     * Handle the Article "deleted" event.
     */
    public function deleted(): void
    {
        GenerateSitemap::dispatch();
    }
}
