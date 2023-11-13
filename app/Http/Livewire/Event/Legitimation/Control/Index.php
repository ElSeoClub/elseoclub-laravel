<?php

namespace App\Http\Livewire\Event\Legitimation\Control;

use App\Models\Event;
use Livewire\Component;

class Index extends Component
{
    public $event;

    public string $screen = 'asistencia';

    public function mount(Event $event){
        $this->event = $event;
    }

    public function render()
    {
        return view('livewire.event.legitimation.control.index');
    }
}
