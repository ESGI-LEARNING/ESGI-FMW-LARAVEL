<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Spatie\Sitemap\Sitemap;

class GenerateSitemapCommand extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate and upload sitemap';

    public function handle(): void
    {
        $sitemap = Sitemap::create();

        $sitemap->add('/');
        $sitemap->add('/blog');

        Article::chunk(200, function (Collection $posts) use ($sitemap) {
            foreach ($posts as $post) {
                $sitemap->add("/blog/{$post->slug}", $post->updated_at, 0.8, 'weekly');
            }
        });

        Storage::disk('s3')
            ->put('config/sitemap.xml', $sitemap->render());

        $this->info('Sitemap generation completed.');
    }
}
