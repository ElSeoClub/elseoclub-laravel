<?php

namespace App\Http\Livewire\Asuntos;

use App\Models\Asunto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{

    public function render()
    {
        $asuntos = Asunto::where('user_id',Auth::user()->id)->get();
        return view('livewire.asuntos.index', compact('asuntos'));
    }
}
