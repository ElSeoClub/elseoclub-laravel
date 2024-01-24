<?php

namespace App\Http\Livewire\Reportes\Laboral;

use Livewire\Component;

class RangoFechas extends Component
{
    public $start;
    public $end;

    protected $rules = [
        'start' => 'required|date',
        'end'   => 'required|date|after_or_equal:start'
    ];

    public function export(){
        $this->validate();
        $this->redirectRoute('reportes.laboral.rango-fechas-excel',['start' => $this->start,'end' => $this->end]);
    }

    public function render()
    {
        return view('livewire.reportes.laboral.rango-fechas');
    }
}
