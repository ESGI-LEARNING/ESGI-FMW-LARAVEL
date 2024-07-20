<?php

namespace App\Livewire\Admin\Comments\Modals;

use App\Models\Comment;
use Illuminate\View\View;
use LivewireUI\Modal\ModalComponent;

class AdminModalReportComment extends ModalComponent
{
    public Comment $comment;

    public function mount(Comment $comment): void
    {
        $this->comment = $comment;
    }

    public function report(): void
    {
        if ($this->comment->is_reported) {
            $this->comment->update([
                'is_reported' => false,
            ]);
        } else {
            $this->comment->update([
                'is_reported' => true,
            ]);
        }
        $this->dispatch('refresh-comments');
        session()->flash('success', 'Commentaire signalé avec succès');
        $this->closeModal();
    }

    public function render(): View
    {
        return view('admin.comments.livewire.modals.modal-admin-comment-report-livewire');
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
}
