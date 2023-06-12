<?php

namespace App\Http\Livewire\Event\Legitimation\Customvotation;

use Livewire\Component;
use App\Models\Event;
use App\Models\Votation;

class Index extends Component
{
    public Event $event;
    public $votations;
    protected $listeners = ['refreshData' => 'refreshData'];

    public function mount(Event $event)
    {
        $this->event = $event;
        $this->votations = $event->votations;
    }

    public function render()
    {
        return view('livewire.event.legitimation.customvotation.index');
    }
}
