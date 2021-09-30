<?php

namespace App\Http\Livewire\Event\Legitimation\Archive;

use App\Models\Event;
use App\Models\Event\Archive;
use Livewire\Component;

class Index extends Component
{
    public $event;

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function delete(Archive $archive)
    {
        if (request()->user()->hasPermission('Jurídico') || request()->user()->hasPermission('Administrator')) {
            $archive->delete();
            $this->emit('alert', 'El archivo fue eliminado exitosamente.');
        }
    }

    public function render()
    {
        return view('livewire.event.legitimation.archive.index');
    }
}
