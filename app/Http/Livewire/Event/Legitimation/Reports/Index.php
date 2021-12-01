<?php

namespace App\Http\Livewire\Event\Legitimation\Reports;

use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $event;
    public $locations;

    public function mount(Event $event)
    {
        $this->event = $event;
        $this->locations = $this->event->locations()->orderBy(DB::raw('ABS(name)'), 'ASC')->get();
    }

    public function locations()
    {
        $this->locations = $this->event->locations()->orderBy(DB::raw('ABS(name)'), 'ASC')->get();
    }

    public function render()
    {
        return view('livewire.event.legitimation.reports.index');
    }
}
