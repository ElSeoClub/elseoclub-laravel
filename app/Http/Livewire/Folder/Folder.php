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

    public $name;
    public $description;

    public function mount(): void
    {
        $this->folders     = $this->folder->folders;
        $this->files       = $this->folder->files;
        $this->ancestors   = $this->ancestors();
        $this->name        = $this->folder->name;
        $this->description = $this->folder->description;
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

    public function save()
    {
        $this->validate([
            'name'        => 'required',
            'description' => 'required',
        ]);

        $this->folder->name        = $this->name;
        $this->folder->description = $this->description;
        $this->folder->save();
        $this->emit('saveAlert', 'Datos guardados exitosamente');
    }

    public function render()
    {
        return view('livewire.folder.folder');
    }
}
