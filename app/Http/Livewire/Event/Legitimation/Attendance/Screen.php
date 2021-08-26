<?php

namespace App\Http\Livewire\Event\Legitimation\Attendance;

use App\Models\Door;
use Livewire\Component;

class Screen extends Component
{
    public $door;
    public $user = null;
    public $qr_code;

    public function get_user($qr_code)
    {
        $this->user = null;
        $user = $this->door->location->event->guests()->where('username', $qr_code)->first();
        if (!$user) {
            $this->emit('alert', ['El código QR es incorrecto o el trabajador no se encuentra registrado en el padrón.', 'error']);
        } else {
            if ($user->pivot->attendance_door_id != null) {
                if ($user->pivot->attendance_door_id == $this->door->id) {
                    $this->emit('alert', ['<b>' . $user->name . '</b><br /> Ya acudió a votar en:<br /> <b class="text-red-600">Esta sede</b>', 'warning']);
                } else {
                    $this->emit('alert', ['<b>' . $user->name . '</b><br /> Ya acudió a votar en:<br /> <b class="text-red-600">Esta sede</b>', 'warning']);
                }
            } else {
                $user->pivot->attendance_door_id = $this->door->id;
                $user->pivot->attendance_location_id = $this->door->location->id;
                $user->pivot->update();
                $this->user = $user;
            }
        }
        $this->qr_code = '';
    }

    public function mount(Door $door)
    {
        $this->door = $door;
    }

    public function render()
    {
        return view('livewire.event.legitimation.attendance.screen');
    }
}
