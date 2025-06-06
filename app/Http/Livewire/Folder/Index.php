<?php

namespace App\Http\Livewire\Folder;

use Livewire\Component;
use App\Models\Folder;
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

        $folders = Folder::whereNull('parent_id')->where('name','like','%'.$this->search.'%')->pagiante();
        return view('livewire.folder.index',compact('folders'));
    }
}
