<?php

namespace App\Livewire\Admin\Comments;

use App\Models\Comment;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCommentLivewire extends Component
{
    use WithPagination;

    #[On('refresh-comments')]
    public function refresh(): void
    {
        $this->render();
    }

    public function render(): View
    {
        $comments = Comment::with('user')->latest()->paginate(10);

        return view('admin.comments.livewire.admin-comment-livewire', compact('comments'));
    }
}
