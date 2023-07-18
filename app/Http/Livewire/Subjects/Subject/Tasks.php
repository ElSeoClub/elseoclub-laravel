<?php

namespace App\Http\Livewire\Subjects\Subject;

use App\Models\Subject;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Tasks extends Component
{
    use WithFileUploads;
    public $subject;
    public $view = 'tasks';
    public $estados;
    public $actuacion;
    public $actuationDate;
    public $actuationComment;
    public $comentariosCierre;
    public $comment;


    public $fileActuacion;
    public $fileNameActuacion;

    public $actuacionEstado;

    protected $rules = [
        'comment'  => 'required'
    ];


    public function mount(Subject $subject){
        $this->subject = $subject;
        $this->estados = preg_split('/[\r\n]+/', $this->subject->matter->task_types, -1, PREG_SPLIT_NO_EMPTY);
    }

    public function view($view){
        $this->view = $view;
    }

    public function agregarActuacion(){
        $this->validate([
            'actuationComment' => 'required',
            'actuationDate' => 'required',
            'actuacionEstado' => 'required|min:1'
        ]);
        $this->subject->tasks()->create([
            'action' => $this->actuacionEstado,
            'usuario_apertura_id' => Auth::user()->id,
            'comentarios_apertura' => $this->actuationComment,
            'fecha' => $this->actuationDate,
            'status' => 0
        ]);
        $this->actuationComment = '';
        $this->actuationDate = null;
        $this->actuacionEstado = 0;
        $this->view = 'tasks';
        $this->subject->fresh();
    }

    public function editarActuacion(Task $task){
        $this->view ='editarActuacion';
        $this->task = $task;
    }

    public function cerrarActuacion(){
        $this->task->status = 1;
        $this->task->comentarios_cierre = $this->comentariosCierre;
        $this->task->usuario_cierre_id = Auth::user()->id;
        Auth::user()->activities()->create([
            'type'     => 'Actuación',
            'comments' => $this->task->action .': <span class="font-bold">'.$this->task->comentarios_cierre.'</span>.  En el caso: <a href="'.route('subjects.subject.tasks',$this->task->subject).'" class="font-bold text-red-600">'. $this->task->subject->name.'</a>.'
        ]);
        $this->task->save();
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

        $this->subject->attachments()->create([
            'name' => $this->fileNameActuacion,
            'extension' => $ext,
            'path' => $filePath,
            'user_id' => Auth::user()->id,
            'task_id' => $this->task->id
        ]);

        Auth::user()->activities()->create([
            'type'     => 'digitalización',
            'comments' => 'Digitalización de documento: <a target="_blank" class="font-bold text-red-600" href="'.asset('storage/'.$filePath).'">'.$this->fileNameActuacion.'</a> en ' . $this->subject->matter->name . ': <a href="'.route('subjects.subject.attachments',$this->subject).'" class="font-bold text-red-600">' . $this->subject->name.'</a>.'
        ]);
        $this->fileActuacion = null;
        $this->fileNameActuacion = null;
    }

    public function addComment(){
        $this->validate([
            'comment' => 'required'
        ]);
        $this->task->comments()->create([
            'user_id' => Auth::user()->id,
            'comment' => $this->comment
        ]);
        $this->emit('saveAlert');
    }


    public function render()
    {

        if(isset($this->fileActuacion)){
            $this->fileNameActuacion = $this->fileActuacion->getClientOriginalName();
        }
        return view('livewire.subjects.subject.tasks');
    }
}
