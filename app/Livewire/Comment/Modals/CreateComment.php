<?php

namespace App\Livewire\Comment\Modals;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class CreateComment extends Component
{
    public int $article_id;

    public string $content;

    protected array $rules = [
        'content' => 'required|string|max:500',
    ];

    public function save(): void
    {
        $this->validate();

        Comment::create([
            'content'     => $this->content,
            'is_reported' => false,
            'user_id'     => Auth::id(),
            'article_id'  => $this->article_id,
            'comment_id'  => null,
        ]);
        $this->dispatch('refresh-comments');
        session()->flash('success', 'Commentaire ajouté avec succès');
        $this->reset('content');
    }

    public function render(): View
    {
        return view('livewire.comment.create-comment');
    }
}
