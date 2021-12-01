<?php

namespace App\Http\Livewire\Event\Legitimation\Reports;

use App\Models\Event;
use Livewire\Component;

class Index extends Component
{
    public $event;

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function render()
    {
        return view('livewire.event.legitimation.reports.index');
    }
}
