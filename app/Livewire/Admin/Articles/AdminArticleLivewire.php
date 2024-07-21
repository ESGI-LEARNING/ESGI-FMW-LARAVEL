<?php

namespace App\Livewire\Admin\Articles;

use App\Models\Article;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class AdminArticleLivewire extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public string $search = '';

    #[On('refresh-articles')]
    public function refresh(): void
    {
        $this->render();
    }

    public function render(): View
    {
        $articles = Article::query()
            ->where(function ($query) {
                $query->where('title', 'like', '%'.$this->search.'%');
            })
            ->paginate(10);

        return view('admin.articles.livewire.admin-article-livewire', compact('articles'));
    }
}
