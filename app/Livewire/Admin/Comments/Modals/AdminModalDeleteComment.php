<?php

namespace App\Livewire\Admin\Comments\Modals;

use App\Models\Comment;
use Illuminate\View\View;
use LivewireUI\Modal\ModalComponent;

class AdminModalDeleteComment extends ModalComponent
{
    public Comment $comment;

    public function mount(Comment $comment): void
    {
        $this->comment = $comment;
    }

    public function delete(): void
    {
        $comment = Comment::query()->where('id', $this->comment->id)->first();
        if($comment) {
            $comment->delete();
        }
        $this->dispatch('refresh-comments');
        $this->closeModal();
    }
    public function render(): View
    {
        return view('admin.comments.livewire.modals.modal-admin-comment-delete-livewire');
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
}
