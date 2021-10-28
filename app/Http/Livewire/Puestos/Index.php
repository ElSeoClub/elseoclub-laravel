<?php

namespace App\Http\Livewire\Puestos;

use App\Models\Puesto;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $puestos = Puesto::where('name', 'like', "%$this->search%")->paginate('10');
        return view('livewire.puestos.index', compact('puestos'));
    }
}
