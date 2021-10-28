<?php

namespace App\Http\Livewire\Consejo;

use App\Models\Consejo\Consulta;
use App\Models\Event;
use Livewire\Component;

class Registro extends Component
{

    public $event, $consulta, $si, $no, $nulo;
    protected $rules = [
        'consulta.si' => '',
        'consulta.no' => '',
        'consulta.nulo' => '',
    ];

    public function save()
    {
        $this->consulta->save();
        $this->emit('alert', 'Los datos fueron guardados exitosamente.');
    }

    public function mount(Event $event, Consulta $consulta)
    {
        $this->event = $event;
        $this->consulta = $consulta;
    }

    public function render()
    {
        return view('livewire.consejo.registro');
    }
}
