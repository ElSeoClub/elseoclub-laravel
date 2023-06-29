<?php

namespace App\Http\Livewire\Subjects\Subject;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class View extends Component
{
    use WithFileUploads;

    public $file;
    public $fileName;
    public $subject;
    public $metadata;
    public $users;

    protected array $rules = [
        'subject.user_id' => '',
        'subject.name' => '',
        'subject.comments' => '',
        'metadata.*' => ''
    ];

    public function mount(Subject $subject){
        $this->users = User::all();
        $this->subject = $subject;
        $this->metadata = $subject->metadata == null ? []: unserialize($subject->metadata);
    }


    public function storeFile(){
        $this->validate([
            'file'     => 'required',
            'fileName' => 'required'
        ]);
        $ext = 'unf';
        if ($this->file) {
            $filePath = $this->file->store('archivo', ['disk' => 'public']);
            $ext = explode('.', $filePath);
            $ext = end($ext);
        }

        $this->subject->attachments()->create([
            'name' => $this->fileName,
            'extension' => $ext,
            'path' => $filePath,
            'user_id' => Auth::user()->id
        ]);

        Auth::user()->activities()->create([
            'type'     => 'digitalización',
            'comments' => 'Digitalización de documento: <a target="_blank" class="font-bold text-red-600" href="'.asset('storage/'.$filePath).'">'.$this->fileName.'</a> en ' . $this->subject->matter->name . ': <a href="'.route('subjects.subject.attachments',$this->subject).'" class="font-bold text-red-600">' . $this->subject->name.'</a>.'
        ]);
        $this->file = null;
        $this->fileName = null;
    }

    public function test(){
        $this->subject->metadata = serialize($this->metadata);
        $this->subject->save();
    }

    public function render()
    {
        if(isset($this->file)){
            $this->fileName = $this->file->getClientOriginalName();
        }
        return view('livewire.subjects.subject.view');
    }
}
