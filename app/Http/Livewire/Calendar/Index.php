<?php

namespace App\Http\Livewire\Calendar;

use App\Models\Actuacion;
use Livewire\Component;

class Index extends Component
{

    public function mount(){

    }
    public function render()
    {

        $actuaciones = Actuacion::orderBy('fecha','asc')->get();
        return view('livewire.calendar.index', compact('actuaciones'));
    }
}
