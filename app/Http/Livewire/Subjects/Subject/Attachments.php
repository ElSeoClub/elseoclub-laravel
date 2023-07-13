<?php

namespace App\Http\Livewire\Subjects\Subject;

use App\Models\Activity;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Attachments extends Component
{
    use WithFileUploads;

    public $file;
    public $fileName;
    public $subject;
    public string $search = '';


    public function mount(Subject $subject){
        $this->subject = $subject;
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


    public function render()
    {
        if(isset($this->file)){
            $this->fileName = $this->file->getClientOriginalName();
        }

        $attachments = $this->subject->fresh()->attachments()->where('name','like','%'.$this->search.'%')->orderBy('name','asc')->get();
        return view('livewire.subjects.subject.attachments',compact('attachments'));
    }
}
