<?php

namespace App\Http\Livewire\Folder;

use Livewire\Component;
use App\Models\Folder;

class Index extends Component
{

    public $folders;

    public function mount(): void
    {
        $this->folders = Folder::whereNull('parent_id')->get();
    }

    public function render()
    {
        return view('livewire.folder.index');
    }
}
