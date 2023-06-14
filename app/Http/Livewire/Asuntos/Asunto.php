<?php

namespace App\Http\Livewire\Asuntos;

use App\Models\Actuacion;
use App\Models\Archivo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Asunto as DbAsunto;
use Livewire\WithFileUploads;

class Asunto extends Component
{
    use WithFileUploads;

    public $asunto;

    public $file;
    public $fileName;

    public $fileActuacion;
    public $fileNameActuacion;

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
        $this->validate([
            'actuationComment' => 'required',
            'actuationDate' => 'required'
        ]);
        $this->asunto->actuaciones()->create([
            'usuario_apertura_id' => Auth::user()->id,
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
        $ext = 'unf';
        if ($this->file) {
            $filePath = $this->file->store('archivo', ['disk' => 'public']);
            $ext = explode('.', $filePath);
            $ext = end($ext);
        }

        $this->asunto->archivos()->create([
            'name' => $this->fileName,
            'extension' => $ext,
            'path' => $filePath,
            'user_id' => Auth::user()->id
        ]);
        $this->file = null;
        $this->fileName = null;
    }

    public function storeFileActuacion(){
        $this->validate([
            'fileActuacion'     => 'required',
            'fileNameActuacion' => 'required'
        ]);
        $ext = 'unf';
        if ($this->fileActuacion) {
            $filePath = $this->fileActuacion->store('archivo', ['disk' => 'public']);
            $ext = explode('.', $filePath);
            $ext = end($ext);
        }

        $this->asunto->archivos()->create([
            'name' => $this->fileNameActuacion,
            'extension' => $ext,
            'path' => $filePath,
            'user_id' => Auth::user()->id,
            'actuacion_id' => $this->actuacion->id
        ]);
        $this->fileActuacion = null;
        $this->fileNameActuacion = null;
    }

    public function render()
    {
        if(isset($this->file)){
            $this->fileName = $this->file->getClientOriginalName();
        }
        if(isset($this->fileActuacion)){
            $this->fileNameActuacion = $this->fileActuacion->getClientOriginalName();
        }
        return view('livewire.asuntos.asunto');
    }
}
