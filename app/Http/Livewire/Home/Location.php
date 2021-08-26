<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;

class Location extends Component
{
    public $location = false;

    public function display_location()
    {
        $this->location = true;
    }

    public function render()
    {
        return view('livewire.home.location');
    }
}
