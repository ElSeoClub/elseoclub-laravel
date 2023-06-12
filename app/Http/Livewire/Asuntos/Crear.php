<?php

namespace App\Http\Livewire\Asuntos;

use App\Models\Asunto;
use App\Models\Tipo;
use Livewire\Component;

class Crear extends Component
{

    public $tipos;

    public $asunto = [
        'expediente' => '',
        'tipo_id' => null
    ];

    protected $rules = [
        'asunto.expediente' => 'required',
        'asunto.tipo_id'    => 'required|numeric|min:1'
    ];

    public function mount(){
        $this->tipos = Tipo::all();
    }

    public function create(){
        $this->validate();
        Asunto::create($this->asunto);
    }

    public function render()
    {
        return view('livewire.asuntos.crear');
    }
}
