<?php

namespace App\Http\Livewire\Matters;

use App\Models\Matter;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $matters = Matter::where('name','like','%'.$this->search.'%')->orderBy('name','asc')->paginate(20);
        return view('livewire.matters.index', compact('matters'));
    }
}
