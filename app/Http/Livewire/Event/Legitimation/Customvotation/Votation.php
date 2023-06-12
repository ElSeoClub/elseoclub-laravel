<?php

namespace App\Http\Livewire\Event\Legitimation\Customvotation;

use Livewire\Component;
use App\Models\Votation as DBVotation;
use App\Models\Event;
use App\Models\Result;
use Illuminate\Database\Eloquent\Builder;

class Votation extends Component
{
    public Event $event;
    public DBVotation $votation;
    public $user_locations;

    public $favor = [];
    public $contra = [];
    public $nulos = [];

    public $rules = [
        'favor[]' => '',
    ];

    public function mount(Event $event, DBVotation $votation)
    {
        $this->event = $event;
        $this->votation = $votation;
        if (auth()->user()->permission->name == "Administrator" || auth()->user()->permission->name == "Jurídico Global") {
            $this->user_locations = $this->event->locations()->get();
        } else {
            $this->user_locations = $this->event->locations()->whereHas('users', function (Builder $query) {
                $query->where('user_id', auth()->user()->id);
            })->get();
        }
    }

    public function update($action, $votes, $votation, $location)
    {
        if ($votes == "") {
            $votes = 0;
        }
        $result = Result::where('votation_id', $votation)->where('location_id', $location)->first();
        $result->{$action} = $votes;
        $result->save();
    }

    public function render()
    {
        return view('livewire.event.legitimation.customvotation.votation');
    }
}
