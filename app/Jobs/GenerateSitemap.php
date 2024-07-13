<?php

namespace App\Jobs;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $sitemap = Sitemap::create();

        $sitemap->add(Url::create('/'));

        $sitemap->add(Url::create('/about'));
        $sitemap->add(Url::create('/contact'));

        Article::all()->each(function (Article $article) use ($sitemap) {
            $sitemap->add(Url::create("/blog/{$article->slug}")
                ->setLastModificationDate($article->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8));
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));
        Log::info('Sitemap generated successfully.');
    }
}
