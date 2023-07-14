<?php

namespace App\Http\Livewire\Activities;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $users;

    public $customActivity;

    public $timer;

    protected $rules = [
        'customActivity' => 'required',
        'timer' => ''
    ];

    public function mount(){
        if(Auth::user()->hasPermission('Jurídico')){
            $this->users = User::where('id',Auth::user()->id)->get();
        }else{
            $this->users = User::whereIn('permission_id',[3,1])->get();
        }
    }

    public function addActivity(){
        $this->validate();

        if($this->timer != null){
            $time = Carbon::today();
            $timer = explode(':',$this->timer);
            $time->addHours($timer[0]);
            $time->addMinutes($timer[1] ?? 0);
            $time->addSeconds($timer[2] ?? 0);
        }else{
            $time = Carbon::now();
        }
        Auth::user()->activities()->create([
            'type' => 'otras',
            'comments' => $this->customActivity,
            'created_at' => $time
        ]);
        $this->customActivity = null;
    }

    public function render()
    {
        return view('livewire.activities.index');
    }
}
