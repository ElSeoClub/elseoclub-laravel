<?php

namespace App\Http\Livewire\Folder;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class File extends Component
{
    use WithFileUploads;

    public \App\Models\Folder $folder;
    public $files;
    public $ancestors;
    public $fileNames = [];

    public $messages = [
        'fileNames.*.required' => 'Por favor ingrese un nombre para el archivo.',
        'fileNames.*.max'      => 'El nombre del archivo no puede ser mayor a 255 caracteres.',
    ];

    public function mount(){
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

    public function updatedFiles(){
        foreach($this->files as $k => $file){
            $this->fileNames[$k] = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        }
    }

    public function save(){
        $this->validate([
            'files'     => 'required',
            'fileNames.*' => 'required|max:255'
        ]);

        if($this->files){
            foreach($this->files as $k => $file){
                $filePath = $file->store('archivo', ['disk' => 'public']);
                $this->folder->files()->create([
                    'name' => $this->fileNames[$k],
                    'path' => $filePath,
                ]);

            }
        }
        $this->files = null;
        redirect()->route('empresas.folder.index', $this->folder);
    }

    public function render()
    {
        $this->ancestors = $this->ancestors();
        return view('livewire.folder.file');
    }
}
