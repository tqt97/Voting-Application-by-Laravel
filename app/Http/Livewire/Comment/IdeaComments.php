<?php

namespace App\Http\Livewire\Comment;

use App\Models\Idea;
use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class IdeaComments extends Component
{
    use WithPagination;

    public $idea;

    protected $listeners = ['commentWasAdded'];

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->goToPage($this->idea->comments()->paginate()->lastPage());
    }

    public function commentWasAdded()
    {
        $this->idea->refresh();
    }

    public function render()
    {
        // $comments = Comment::with('user')
        //     ->where('idea_id', $this->idea->id)
        //     ->paginate()
        //     ->withQueryString();

        $comments = $this->idea->comments()->with(['user'])->paginate()->withQueryString();

        return view('livewire.comment.idea-comments', [
            'comments' => $comments
        ]);
    }
}
