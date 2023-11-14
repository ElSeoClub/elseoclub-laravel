<?php

namespace App\Http\Livewire\Event\Legitimation\Control;

use App\Models\Control;
use App\Models\Event;
use Livewire\Component;

class Index extends Component
{
    public $event;

    public string $screen = 'asistencia';
    public $substring = null;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount(Event $event){
        $this->event = $event;
    }

    public function render()
    {
        $this->screen = Control::first()->screen;
        $this->subscreen = Control::first()->subscreen;
        return view('livewire.event.legitimation.control.index');
    }
}
