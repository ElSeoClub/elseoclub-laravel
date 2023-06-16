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

        $actuaciones = Actuacion::whereDate('fecha', '=', date('Y-m-d'))->orderBy('fecha','asc')->get();
        return view('livewire.calendar.index', compact('actuaciones'));
    }
}
