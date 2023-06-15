<?php

namespace App\Http\Livewire\Asuntos;

use App\Models\Asunto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $asuntos = Asunto::where('status','abierto')->where('expediente','like','%'.$this->search.'%')->paginate(10);
        return view('livewire.asuntos.index', compact('asuntos'));
    }
}
