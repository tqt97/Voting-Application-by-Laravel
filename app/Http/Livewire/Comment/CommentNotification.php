<?php

namespace App\Http\Livewire\Comment;

use Livewire\Component;

class CommentNotification extends Component
{
    public $notifications;

    protected $listeners = ['getNotifications'];

    public function mount()
    {
        $this->notifications = collect([]);
    }

    public function getNotifications()
    {
        $this->notifications = auth()->user()->unreadNotifications;
    }

    public function render()
    {
        return view('livewire.comment.comment-notification');
    }
}
