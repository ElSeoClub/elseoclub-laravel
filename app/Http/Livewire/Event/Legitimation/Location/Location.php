<?php

namespace App\Http\Livewire\Event\Legitimation\Location;

use App\Models\Event;
use App\Models\Location as ModelsLocation;
use Livewire\Component;
use Livewire\WithFileUploads;

class Location extends Component
{
    use WithFileUploads;

    public $convocatoria;
    public $event;
    public $location;

    protected $rules = [
        'location.boletas' => 'required|numeric',
        'location.description' => '',
        'location.georeferences' => '',
        'location.schedule' => ''
    ];

    public function mount(Event $event, ModelsLocation $location)
    {
        $this->event = $event;
        $this->location = $location;
    }

    public function save()
    {
        if ($this->convocatoria) {
            $convocatoria_path = $this->convocatoria->store('convocatorias', ['disk' => 'public']);
            $this->location->convocatoria = $convocatoria_path;
        }
        $this->location->save();
        $this->emit('alert', 'La sede fue actualizada exitosamente.');
    }

    public function render()
    {
        return view('livewire.event.legitimation.location.location');
    }
}
