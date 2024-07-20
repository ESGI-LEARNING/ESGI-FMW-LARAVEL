<?php

namespace App\Livewire\Comment;

use App\Models\Article;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class CommentLivewire extends Component
{
    public Article $article;

    #[On('refresh-comments')]
    public function refresh(): void
    {
        $this->render();
    }

    public function render(): View
    {
        $article = Article::query()
            ->with(['categories', 'images'])
            ->where('is_published', true)
            ->findOrFail($this->article->id);

        $comments = $article->comments()
            ->whereNull('comment_id')
            ->with(['replies', 'user'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.comment.comment-livewire', compact('article', 'comments'));
    }
}
