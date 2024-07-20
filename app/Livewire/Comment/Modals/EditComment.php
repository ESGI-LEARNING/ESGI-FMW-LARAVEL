<?php

namespace App\Livewire\Comment\Modals;

use App\Models\Comment;
use Illuminate\View\View;
use LivewireUI\Modal\ModalComponent;

class EditComment extends ModalComponent
{
    public Comment $comment;

    public string $content;

    protected array $rules = [
        'content' => 'required|string|max:500',
    ];

    public function mount(Comment $comment): void
    {
        $this->comment = $comment;
        $this->content = $comment->content;
    }

    public function update(): void
    {
        $this->validate();

        $this->comment->update([
            'content' => $this->content,
        ]);

        $this->dispatch('refresh-comments');
        session()->flash('success', 'Commentaire modifié avec succès');
        $this->closeModal();
    }

    public function render(): View
    {
        return view('livewire.comment.edit-comment');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
