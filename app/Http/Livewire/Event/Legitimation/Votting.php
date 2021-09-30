<?php

namespace App\Http\Livewire\Event\Legitimation;

use Livewire\Component;

class Votting extends Component
{
    public $event;

    public function mount($event)
    {
        $this->event = $event;
    }

    public function render()
    {
        return view('livewire.event.legitimation.votting');
    }
}
