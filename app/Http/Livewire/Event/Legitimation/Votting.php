<?php

namespace App\Http\Livewire\Event\Legitimation;

use Livewire\Component;

class Votting extends Component
{
    public $event;

    protected $rules = [
        'event.si' => '',
        'event.no' => '',
        'event.nulo' => ''
    ];

    public function mount($event)
    {
        $this->event = $event;
    }

    public function save()
    {
        $this->event->save();
        $this->emit('alert', 'El conteo de votos fue guardado exitosamente');
    }

    public function render()
    {
        return view('livewire.event.legitimation.votting');
    }
}
