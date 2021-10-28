<?php

namespace App\Http\Livewire\Consejo;

use App\Models\Event;
use Livewire\Component;

class Votaciones extends Component
{
    public $event;

    public function mount(Event $event)
    {
        $this->event = $event;
    }
    public function render()
    {
        $locations = $this->event->locations;
        return view('livewire.consejo.votaciones', compact('locations'));
    }
}
