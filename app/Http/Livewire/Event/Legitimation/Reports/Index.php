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
        if (auth()->user()->permission->name == "Administrator" || auth()->user()->permission->name == "Jurídico Global") {
            $user_locations = $this->event->fresh()->locations()->get();
        } else {
            $user_locations = $this->event->fresh()->locations()->whereHas('users', function (Builder $query) {
                $query->where('user_id', auth()->user()->id);
            })->get();
        }
        return view('livewire.event.legitimation.reports.index', compact('locations'));
    }
}
