<?php

namespace App\Http\Livewire\Consejo;

use App\Models\Consejo\Consulta;
use App\Models\Event;
use Livewire\Component;

class Nuevo extends Component
{
    public $name;
    public $short_name;
    public $event;

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function add()
    {
        $locations = $this->event->locations;

        foreach ($locations as $location) {
            $consulta = new Consulta();
            $consulta->event_id = $this->event->id;
            $consulta->location_id = $location->id;
            $consulta->name = $this->name;
            $consulta->short_name = $this->short_name;
            $consulta->si = 0;
            $consulta->no = 0;
            $consulta->nulo = 0;
            $consulta->save();
            $this->emit('alert', 'La consulta fue agregada exitosamente');
        }
    }

    public function render()
    {
        return view('livewire.consejo.nuevo');
    }
}
