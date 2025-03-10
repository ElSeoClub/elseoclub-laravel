<?php

namespace App\Http\Livewire\Folder;

use Illuminate\Support\Collection;
use Livewire\Component;

class Create extends Component
{
    public \App\Models\Folder|null $folder = null;

    public $name;
    public $withFiles = false;
    public $withSubfolders = false;

    public $ancestors;

    public function mount(){
        $this->ancestors = $this->ancestors();
    }

    public function ancestors(): Collection
    {
        $ancestors = collect([]);

        $parent = $this->folder->parent ?? null;

        if ($parent) {
            while ($parent) {
                $ancestors->prepend($parent);
                $parent = $parent->parent;
            }
        }
        return $ancestors;
    }

    public function save(){
        if(!$this->withFiles && !$this->withSubfolders) {
            $this->addError('selectOne', 'Debes seleccionar al menos una opción');

            return;
        }
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $folder = \App\Models\Folder::create([
            'name' => $this->name,
            'parent_id' => $this->folder ? $this->folder->id : null,
            'with_files' => $this->withFiles? true : false,
            'with_subfolders' => $this->withSubfolders? true : false,
        ]);

        redirect()->route('empresas.folder.index', $folder);
    }

    public function render()
    {
        return view('livewire.folder.create');
    }
}
