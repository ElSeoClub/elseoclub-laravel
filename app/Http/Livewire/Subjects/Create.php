<?php

namespace App\Http\Livewire\Subjects;

use App\Models\Matter;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public Matter $matter;
    public string $name;
    public string $comments;

    protected array $rules = [
        'name' => 'required',
        'comments' => ''
    ];

    public function mount(Matter $matter){
        $this->matter = $matter;
    }

    public function create(){
        $this->validate();
        $subject = $this->matter->subjects()->create([
            'name'     => $this->name,
            'comments' => $this->comments,
            'user_id' => Auth::user()->id
        ]);

        $this->redirectRoute('subjects.subject.view',$subject);
    }

    public function render()
    {
        return view('livewire.subjects.create');
    }
}
