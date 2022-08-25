<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use App\Models\Vote;
use Livewire\Component;
use Illuminate\Http\Response;

class DeleteIdea extends Component
{
    public $idea;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function deleteIdea()
    {
        if (auth()->guest() || auth()->user()->cannot('delete', $this->idea)) {
            abort(Response::HTTP_FORBIDDEN);
        }

        Vote::where('idea_id', $this->idea->id)->delete();

        Idea::destroy($this->idea->id);
        session()->flash('success_message', 'Idea was deleted successfully!');

        return redirect()->route('ideas.index');
    }

    public function render()
    {
        return view('livewire.idea.delete-idea');
    }
}
