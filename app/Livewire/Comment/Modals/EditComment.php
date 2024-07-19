<?php

namespace App\Livewire\Comment\Modals;

use App\Models\Comment;
use Livewire\Component;

class EditComment extends Component
{
    protected $listeners = ['openModal'];

    public $content;

    protected $rules = [
        'content' => 'required|string|max:500',
    ];

    public function openModal($modal, $comment)
    {
        $this->{$modal . 'Modal'} = true;
        $this->comment = $comment;
    }

    public function update() :void
    {
        $this->validate();
        $comment = Comment::find($this->comment->id);
        $comment->content = $this->content;
        $comment->save();
        $this->dispatchBrowserEvent('commentUpdated');
    }
    public function render()
    {
        return view('livewire.comment.edit-comment');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
