<?php

namespace App\Http\Livewire\Folder;

use Illuminate\Support\Collection;
use Livewire\Component;

class Folder extends Component
{
    public \App\Models\Folder $folder;

    public $folders;
    public $ancestors;
    public $files;

    public function mount(): void
    {
        $this->folders = $this->folder->folders;
        $this->files = $this->folder->files;
        $this->ancestors = $this->ancestors();

    }

    public function ancestors(): Collection
    {
        $ancestors = collect([]);

        $parent = $this->folder->parent;

        if ($parent) {
            while ($parent) {
                $ancestors->prepend($parent);
                $parent = $parent->parent;
            }
        }
        return $ancestors;
    }

    public function render()
    {
        return view('livewire.folder.folder');
    }
}
