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
        'asunto.user_id'    => '',
        'metas.prioridad.meta_value' => '',
        'metas.fecha_presentacion.meta_value' => '',
        'metas.accion_ejercida.meta_value' => '',
        'metas.demandado.meta_value' => '',
        'metas.actor.meta_value' => '',
        'metas.junta.meta_value' => '',
    ];

    public function mount(){
        $this->tipos = Tipo::all();
        $this->abogados = User::all();
        $this->metas = [
            'actor' => [
                'meta_key' => 'actor',
                'meta_value' => null
            ],
            'prioridad' => [
                'meta_key' => 'prioridad',
                'meta_value' => null
            ],
            'fecha_presentacion' => [
                'meta_key' => 'fecha_presentacion',
                'meta_value' => 1
            ],
            'accion_ejercida' => [
                'meta_key' => 'accion_ejercida',
                'meta_value' => null
            ],
            'demandado' => [
                'meta_key' => 'demandado',
                'meta_value' => null
            ],
            'junta' => [
                'meta_key' => 'junta',
                'meta_value' => null
            ]
        ];
    }

    public function create(){;
        $this->validate();
        $asunto = Asunto::create($this->asunto);

        foreach($this->metas as $meta) {
            if ($meta['meta_value'] == null)
                $meta['meta_value'] = '';
            $asunto->metas()->create($meta);
        }
        $this->redirectRoute('asuntos.asunto',compact('asunto'));
    }

    public function render()
    {
        return view('livewire.asuntos.crear');
    }
}
