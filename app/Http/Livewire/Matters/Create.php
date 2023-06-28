<?php

namespace App\Http\Livewire\Matters;

use App\Models\Matter;
use Livewire\Component;

class Create extends Component
{
    public string $name;

    protected $rules = [
        'name' => 'required|unique:matters'
    ];

    public function create(){
        $this->validate();

        $matter = Matter::create([
            'name'   => $this->name,
            'status' => 'draft'
        ]);

    }

    public function render()
    {
        return view('livewire.matters.create');
    }
}
