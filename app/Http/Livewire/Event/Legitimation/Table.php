<?php

namespace App\Http\Livewire\Event\Legitimation;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $legitimations = Event::where('eventtype_id', env('LEGITIMACION', 1))->where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.event.legitimation.table', compact('legitimations'));
    }
}
