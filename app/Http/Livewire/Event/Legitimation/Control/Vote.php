<?php

namespace App\Http\Livewire\Event\Legitimation\Control;

use App\Models\Event;
use Livewire\Component;

class Vote extends Component
{
    public $event;

    public $name;
    public $label_1 = null;
    public $label_2 = null;
    public $label_3 = null;
    public $label_4 = null;
    public $label_5 = null;
    public $label_6 = null;
    public $label_7 = null;
    public $label_8 = null;
    public $label_9 = null;

    public $label_10;

    protected $rules = [
        'name'    => 'required',
        'label_1' => 'required',
        'label_2' => 'required'
    ];


    public function mount(Event $event){
        $this->event = $event;
    }

    public function create(){
        $this->validate();
        foreach($this->event->locations as $location){
            \App\Models\Votacion::create([
                'event_id' => $this->event->id,
               'location_id' => $location->id,
               'name' => $this->name,
                'label_1' => $this->label_1,
                'label_2' => $this->label_2,
                'label_3' => $this->label_3,
                'label_4' => $this->label_4,
                'label_5' => $this->label_5,
                'label_6' => $this->label_6,
                'label_7' => $this->label_7,
                'label_8' => $this->label_8,
                'label_9' => $this->label_9,
                'label_10' => $this->label_10,

            ]);
        }
    }

    public function render()
    {
        return view('livewire.event.legitimation.control.vote');
    }
}
