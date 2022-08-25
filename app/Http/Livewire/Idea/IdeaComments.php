<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use Livewire\Component;

class IdeaComments extends Component
{
    public $idea;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function render()
    {
        return view('livewire.idea.idea-comments', [
            'comments' => $this->idea->comments,
        ]);
    }
}
