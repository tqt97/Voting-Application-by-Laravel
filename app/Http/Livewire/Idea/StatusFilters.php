<?php

namespace App\Http\Livewire\Idea;

use App\Models\Status;
use Livewire\Component;
use Illuminate\Support\Facades\Route;

class StatusFilters extends Component
{
    public $status;
    public $statusCount;


    public function mount()
    {
        $this->statusCount = Status::getCount();
        $this->status = request()->status ?? 'All';


        if (Route::currentRouteName() === 'ideas.show') {
            $this->status = null;
        }
    }

    public function setStatus($newStatus)
    {
        $this->status = $newStatus;
        $this->emit('queryStringUpdatedStatus', $this->status);


        if ($this->getPreviousRouteName() === 'ideas.show') {
            return redirect()->route('ideas.index', [
                'status' => $this->status,
            ]);
        }
    }
    public function getPreviousRouteName()
    {
        return app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
    }

    public function render()
    {
        return view('livewire.idea.status-filters');
    }
}
