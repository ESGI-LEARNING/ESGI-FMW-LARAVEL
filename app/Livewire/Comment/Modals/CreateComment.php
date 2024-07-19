<?php

namespace App\Livewire\Comment\Modals;

use App\Models\Comment;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateComment extends Component
{
    public $article_id;
    public $content;

    protected $rules = [
        'content' => 'required|string|max:500',
    ];

    public function save()
    {
        $this->validate();

        Comment::create([
            'content' => $this->content,
            'is_reported' => false,
            'user_id' => Auth::id(),
            'article_id' => $this->article_id,
            'comment_id' => null,
        ]);

        $this->reset('content');
    }

    public function render()
    {
        return view('livewire.comment.create-comment');
    }
}
