<?php

namespace App\Http\Livewire\Comment;

use App\Models\Comment;
use Livewire\Component;

class IdeaComment extends Component
{
    public $comment;

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }
    public function render()
    {
        return view('livewire.comment.idea-comment');
    }
}
