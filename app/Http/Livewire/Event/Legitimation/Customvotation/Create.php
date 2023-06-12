<?php

namespace App\Http\Livewire\Event\Legitimation\Customvotation;

use Livewire\Component;
use App\Models\Votation;
use App\Models\Event;
use App\Models\Result;

class Create extends Component
{
    public $name;
    public Event $event;

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public $rules = [
        'name' => 'required'
    ];

    public function create()
    {
        $votation = new Votation();
        $votation->event_id = $this->event->id;
        $votation->name = $this->name;
        $votation->save();

        foreach ($this->event->locations as $location) {
            $result = new Result();
            $result->location_id = $location->id;
            $result->votation_id = $votation->id;
            $result->save();
        }
    }

    public function render()
    {
        return view('livewire.event.legitimation.customvotation.create');
    }
}
