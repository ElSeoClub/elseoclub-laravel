<?php

namespace App\Http\Livewire\Asuntos;

use App\Models\Asunto;
use App\Models\Tipo;
use App\Models\User;
use Livewire\Component;

class Crear extends Component
{

    public $tipos;
    public $abogados;

    public $asunto = [
        'expediente' => '',
        'tipo_id' => null,
        'user_id' => null
    ];

    public $metas;

    protected $rules = [
        'asunto.expediente' => 'required',
        'asunto.tipo_id'    => 'required|numeric|min:1',
        'asunto.user_id'    => 'required|numeric|min:1',
        'metas.prioridad.meta_value' => '',
        'metas.estado_procesal.meta_value' => ''
    ];

    public function mount(){
        $this->tipos = Tipo::all();
        $this->abogados = User::all();
        $this->metas = [
            'prioridad' => [
                'meta_key' => 'prioridad',
                'meta_value' => null
            ],
            'estado_procesal' => [
                'meta_key' => 'estado_procesal',
                'meta_value' => null
            ]
        ];
    }

    public function create(){;
        $this->validate();
        $asunto = Asunto::create($this->asunto);

        foreach($this->metas as $meta){
            $asunto->metas()->create($meta);
        }
        $this->redirectRoute('asuntos.asunto',compact('asunto'));


    }

    public function render()
    {
        return view('livewire.asuntos.crear');
    }
}
