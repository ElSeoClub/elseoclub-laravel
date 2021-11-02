<?php

namespace App\Http\Livewire\Consejo;

use App\Models\Event;
use Livewire\Component;

class Stats extends Component
{
    public $event;
    public $consultax;

    public function mount(Event $event, $consulta)
    {
        $this->event = $event;
        $this->consultax = $consulta;
    }


    public function render()
    {
        $locations = $this->event->locations;
        return view('livewire.consejo.stats', compact('locations'));
    }
}
