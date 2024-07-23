<?php

namespace App\Livewire\Comment\Modals;

use App\Models\Comment;
use Illuminate\View\View;
use LivewireUI\Modal\ModalComponent;

class DeleteComment extends ModalComponent
{
    public $comment;

    public function mount(Comment $comment): void
    {
        $this->comment = $comment;
    }

    public function delete(): void
    {
        if ($this->comment) {
            $this->comment->delete();
            $this->dispatch('refresh-comments');
            session()->flash('success', 'Commentaire supprimé avec succès');
        } else {
            session()->flash('error', 'Commentaire non trouvé');
        }
        $this->closeModal();
    }

    public function render(): View
    {
        return view('livewire.comment.delete-comment');
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
}
