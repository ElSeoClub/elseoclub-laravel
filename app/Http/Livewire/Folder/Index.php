<?php

namespace App\Http\Livewire\Folder;

use App\Models\Folder;
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
        $folders = Folder::whereNull('parent_id')->where('name', 'like', '%' . $this->search . '%')->paginate(10);

        return view('livewire.folder.index', compact('folders'));
    }
}
