<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use App\Jobs\GenerateSitemap;
use Illuminate\Support\Facades\Storage;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemapCommand extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate and upload sitemap';

    public function handle()
    {
        $sitemap = Sitemap::create();

        // Ajoutez la page d'accueil
        $sitemap->add(Url::create('/'));

        // Ajoutez d'autres pages statiques
        $sitemap->add(Url::create('/about'));
        $sitemap->add(Url::create('/contact'));

        // Ajoutez des pages dynamiques, par exemple des articles de blog
        Article::all()->each(function (Article $post) use ($sitemap) {
            $sitemap->add(Url::create("/blog/{$post->slug}")
                ->setLastModificationDate($post->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8));
        });

        // Sauvegardez le sitemap dans le dossier public
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generation job dispatched.');
    }
}
