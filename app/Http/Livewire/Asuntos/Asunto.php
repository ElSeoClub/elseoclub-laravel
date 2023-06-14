<?php

namespace App\Http\Livewire\Asuntos;

use App\Models\Actuacion;
use App\Models\Archivo;
use Livewire\Component;
use App\Models\Asunto as DbAsunto;
use Livewire\WithFileUploads;

class Asunto extends Component
{
    use WithFileUploads;

    public $asunto;

    public $file;
    public $fileName;

    public $view = 'info';
    public $actuacion;
    public $actuationDate;
    public $actuationComment;
    public $comentariosCierre;
    public $filePath;

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
        $this->validate([
            'actuationComment' => 'required',
            'actuationDate' => 'required'
        ]);
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

    public function storeFile(){
        $this->validate([
            'file'     => 'required',
            'fileName' => 'required'
        ]);
        if ($this->file) {
            $this->filePath = $this->file->store('archivo', ['disk' => 'public']);
        }
        $ext = explode('.', $this->filePath);
        $ext = end($ext);
        $this->asunto->archivos()->create([
            'name' => $this->fileName,
            'extension' => $ext,
            'path' => $this->filePath,
        ]);|
    }

    public function render()
    {
        if(isset($this->file)){
            $this->fileName = str_replace('.'.$this->file->getClientOriginalExtension(),'',$this->file->getClientOriginalName());
        }
        return view('livewire.asuntos.asunto');
    }
}
