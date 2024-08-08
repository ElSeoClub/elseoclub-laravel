<?php

namespace App\Http\Livewire\Reportes\Tribunal;

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
        $this->redirectRoute('reportes.tribunal_date_excel',['start' => $this->start,'end' => $this->end]);
    }

    public function render()
    {
        return view('livewire.reportes.tribunal.rango-fechas');
    }
}
