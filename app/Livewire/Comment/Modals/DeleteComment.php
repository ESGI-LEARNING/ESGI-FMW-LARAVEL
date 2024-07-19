<?php

namespace App\Livewire\Comment\Modals;

use App\Models\Comment;
use Livewire\Component;

class DeleteComment extends Component
{
    protected $listeners = ['openModal'];

    public function openModal($modal, $comment): void
    {
        $this->{$modal . 'Modal'} = true;
        $this->comment = $comment;
    }

    public function delete():void
    {
        $comment = Comment::find($this->comment_id);
        $comment->delete();
        $this->dispatchBrowserEvent('commentDeleted');
    }
    public function render()
    {
        return view('livewire.comment.delete-comment');
    }
}
