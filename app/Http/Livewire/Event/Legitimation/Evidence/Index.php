<?php

namespace App\Http\Livewire\Event\Legitimation\Evidence;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Event;

class Index extends Component
{

    public $event;
    public $search;

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function render()
    {
        $locations = $this->event->locations()->where('name', 'like', "%$this->search%")->get();
        return view('livewire.event.legitimation.evidence.index', compact('locations'));
    }
}
