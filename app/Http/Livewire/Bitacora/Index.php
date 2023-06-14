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

    public function add($parent = null){
        $this->validate([
            'comentarios' => 'required'
        ]);
        if($parent){
            $bitacora = Bitacora::create([
                'user_id' => Auth::user()->id,
                'bitacora_id' => $parent,
                'comentarios' => $this->comentarios

            ]);
        }else{
            $bitacora = Bitacora::create([
                'user_id' => Auth::user()->id,
                'comentarios' => $this->comentarios
            ]);
        }
        $this->comentarios = null;
    }

    public function pin(Bitacora $bitacora){
        $bitacora->pin = 1;
        $bitacora->save();
    }
    public function unpin(Bitacora $bitacora){
        $bitacora->pin = 0;
        $bitacora->save();
    }

    public function render()
    {
        $pinmensajes = Bitacora::where('user_id',Auth::user()->id)->whereNull('bitacora_id')->where('pin',1)->orderBy('created_at','desc')->with('childs')->get();
        $mensajes = Bitacora::where('user_id',Auth::user()->id)->whereNull('bitacora_id')->where('pin',0)->orderBy('created_at','desc')->with('childs')->get();
        return view('livewire.bitacora.index',compact('mensajes','pinmensajes'));
    }
}
