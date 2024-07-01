<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Role;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class
        ]);

        User::factory(20)->create();

        $categories = Category::factory(10)->create();

        // CREATE 20 ARTICLES
        Article::factory(20)
            ->create()
            ->each(function ($article) use ($categories) {
                $article->categories()->attach($categories->random(3)->pluck('id')->toArray());

                // CREATE 10 IMAGES FOR EACH ARTICLE
                Image::factory(3)->create([
                    'article_id' => $article->id,
                ]);

                // CREATE 10 COMMENTS FOR EACH ARTICLE
                Comment::factory(15)->create([
                    'article_id' => $article->id,
                ]);
            });
    }
}
