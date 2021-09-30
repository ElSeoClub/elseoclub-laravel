<?php

namespace App\Http\Livewire\Event\Legitimation\Evidence;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Event;

class Index extends Component
{
    use WithFileUploads;

    public $event;

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function render()
    {
        return view('livewire.event.legitimation.evidence.index');
    }
}
