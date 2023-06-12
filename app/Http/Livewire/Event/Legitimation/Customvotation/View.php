<?php

namespace App\Http\Livewire\Event\Legitimation\Customvotation;

use Livewire\Component;
use App\Models\Event;

class View extends Component
{
    public Event $event;

    public function mount(Event $event)
    {
        $this->event = $event;
    }
    public function render()
    {
        return view('livewire.event.legitimation.customvotation.view');
    }
}
