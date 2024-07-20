<?php

namespace App\Livewire\Comment\Modals;

use App\Models\Comment;
use Illuminate\View\View;
use LivewireUI\Modal\ModalComponent;

class AnswerComment extends ModalComponent
{
    public Comment $comment;

    public string $content;

    protected array $rules = [
        'content' => 'required|string|max:500',
    ];

    public function mount(Comment $comment): void
    {
        $this->comment = $comment;
    }

    public function reply(): void
    {
        $this->validate();

        Comment::create([
            'content'     => $this->content,
            'is_reported' => false,
            'user_id'     => auth()->id(),
            'article_id'  => $this->comment->article_id,
            'comment_id'  => $this->comment->id,
        ]);

        $this->dispatch('refresh-comments');
        session()->flash('success', 'Réponse ajoutée avec succès');
        $this->closeModal();
    }

    public function render(): View
    {
        return view('livewire.comment.answer-comment');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
