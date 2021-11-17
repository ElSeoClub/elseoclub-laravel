<?php

namespace App\Http\Livewire\Event\Legitimation\Statistics;

use App\Models\Location;
use App\Models\Event;
use Carbon\Carbon;
use Livewire\Component;

class Index extends Component
{
    public $event;
    public $search;

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function llegada(Location $location)
    {
        $location->llegada_verificador = Carbon::now();
        $location->save();
    }

    public function apertura(Location $location)
    {
        $location->status = 1;
        $location->save();
    }

    public function cierre(Location $location)
    {
        $location->status = 2;
        $location->save();
    }

    public function conteo(Location $location)
    {
        $location->status = 3;
        $location->save();
    }

    public function render(Location $location)
    {
        $locations = $this->event->locations()->where('name', 'like', '%' . $this->search . '%')->get();
        return view('livewire.event.legitimation.statistics.index', compact('locations'));
    }
}
