<?php

namespace App\Http\Livewire\Asuntos;

use App\Models\Asunto;
use Livewire\Component;

class Index extends Component
{

    public function render()
    {
        $asuntos = Asunto::all();
        return view('livewire.asuntos.index', compact('asuntos'));
    }
}
