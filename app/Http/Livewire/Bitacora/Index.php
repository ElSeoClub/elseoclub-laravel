<?php

namespace App\Http\Livewire\Bitacora;

use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{

    public $comentarios;

    protected $rules = [
        'comentarios' => 'required'
    ];

    public function add(){
        $bitacora = Bitacora::create([
            'user_id' => Auth::user()->id,
            'comentarios' => $this->comentarios
        ]);
    }

    public function render()
    {
        $mensajes = Bitacora::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('livewire.bitacora.index',compact('mensajes'));
    }
}
