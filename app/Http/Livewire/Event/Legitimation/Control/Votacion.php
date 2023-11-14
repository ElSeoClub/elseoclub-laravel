<?php

namespace App\Http\Livewire\Event\Legitimation\Control;

use App\Models\Event;
use Livewire\Component;

class Votacion extends Component
{
    public $votations;
    protected $listeners = ['refreshComponent' => '$refresh'];
    public function mount(Event $event, $subscreen){
        $this->event = $event;
        $this->subscreen = $subscreen;
        $this->votations = \App\Models\Votacion::where('name',$subscreen)->get();
    }

    public function render()
    {
        return view('livewire.event.legitimation.control.votacion');
    }
}
