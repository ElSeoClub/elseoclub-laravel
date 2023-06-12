<?php

namespace App\Http\Livewire\Asuntos;

use App\Models\Actuacion;
use Livewire\Component;
use App\Models\Asunto as DbAsunto;

class Asunto extends Component
{
    public $asunto;

    public $view = 'info';
    public $actuacion;
    public $actuationDate;
    public $actuationComment;
    public $comentariosCierre;

    protected $rules = [
        'actuationDate'    => '',
        'actuationComment' => '',
        'comentariosCierre' => ''
    ];

    public function mount(DbAsunto $asunto){
        $this->asunto = $asunto;
    }

    public function view($view){
        $this->view = $view;
    }

    public function agregarActuacion(){
        $this->asunto->actuaciones()->create([
            'comentarios_apertura' => $this->actuationComment,
            'fecha' => $this->actuationDate,
            'status' => 0
        ]);
        $this->actuationComment = '';
        $this->actuationDate = null;
        $this->view = 'actuaciones';
        $this->asunto->fresh();
    }

    public function editarActuacion(Actuacion $actuacion){
        $this->view ='editarActuacion';
        $this->actuacion = $actuacion;
    }

    public function cerrarActuacion(){
        $this->actuacion->status = 1;
        $this->actuacion->comentarios_cierre = $this->comentariosCierre;
        $this->actuacion->save();
    }

    public function render()
    {
        return view('livewire.asuntos.asunto');
    }
}
