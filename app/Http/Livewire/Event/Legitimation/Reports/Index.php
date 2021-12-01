<?php

namespace App\Http\Livewire\Event\Legitimation\Reports;

use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $event;
    public $view = 'status';

    public function display($view)
    {
        $this->view = $view;
    }

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function render()
    {
        $locations = $this->event->fresh()->locations()->orderBy(DB::raw('ABS(name)'), 'ASC')->get();
        return view('livewire.event.legitimation.reports.index', compact('locations'));
    }
}
