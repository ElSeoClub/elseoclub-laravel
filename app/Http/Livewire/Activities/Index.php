<?php

namespace App\Http\Livewire\Activities;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $users;

    public $customActivity;

    protected $rules = [
        'customActivity' => 'required'
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
        Auth::user()->activities()->create([
            'type' => 'otras',
            'comments' => $this->customActivity
        ]);
        $this->customActivity = null;
    }

    public function render()
    {
        return view('livewire.activities.index');
    }
}
