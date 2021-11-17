<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\Event;
use App\Models\User;

class Location extends Component
{
    public $location = false;
    public $user;
    public $username;
    public $event;

    public function display_location()
    {
        $this->location = true;
        $this->event = Event::find(1);
        $this->user = User::where('username', $this->username)->first();
    }

    public function render()
    {
        return view('livewire.home.location');
    }
}
