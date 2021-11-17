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
    public $message;

    public function display_location()
    {
        $this->location = true;
        $this->event = Event::find(1);
        $this->user = User::where('username', $this->username)->first();
        $this->message = '';
        if (!$this->user) {
            $this->location = false;
            $this->message = 'El trabajador <span class="font-bold text-red-600">' . $this->username . '</span> no se encuentró en el padrón.';
        }
    }

    public function render()
    {
        return view('livewire.home.location');
    }
}
