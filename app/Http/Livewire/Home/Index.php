<?php

namespace App\Http\Livewire\Home;

use App\Models\Matter;
use Livewire\Component;

class Index extends Component
{
    public $matters;

    public function mount(){
        $this->matters = Matter::where('status','publish')->orderBy('name','asc')->get();
    }


    public function render()
    {
        return view('livewire.home.index');
    }
}
