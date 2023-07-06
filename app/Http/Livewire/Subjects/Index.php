<?php

namespace App\Http\Livewire\Subjects;

use App\Models\Matter;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public $matter;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(Matter $matter){
        $this->matter = $matter;
    }

    public function render()
    {
        $subjects = $this->matter->subjects()
                                 ->where(function($q)  {
                                     $q->where('name','like','%'.$this->search.'%')
                                       ->orWhere('comments','like','%'.$this->search.'%')
                                       ->orWhere('metadata','like','%'.$this->search.'%');
                                 })->paginate(10);

        return view('livewire.subjects.index',compact('subjects'));
    }
}
