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

    public $files;
    public $subject;
    public string $search = '';



    public function mount(Subject $subject){
        $this->subject = $subject;
    }

    public function storeFile(){
        $this->validate([
            'files'     => 'required'
        ]);
        $ext = 'unf';

        if($this->files){
            foreach($this->files as $file){
                if ($file) {
                    $filePath = $file->store('archivo', ['disk' => 'public']);
                    $ext = explode('.', $filePath);
                    $ext = end($ext);
                }

                $this->subject->attachments()->create([
                    'name' => $file->getClientOriginalName(),
                    'extension' => $ext,
                    'path' => $filePath,
                    'user_id' => Auth::user()->id
                ]);

                Auth::user()->activities()->create([
                    'type'     => 'digitalización',
                    'comments' => 'Digitalización de documento: <a target="_blank" class="font-bold text-red-600" href="'.asset('storage/'.$filePath).'">'.$file->getClientOriginalName().'</a> en ' . $this->subject->matter->name . ': <a href="'.route('subjects.subject.attachments',$this->subject).'" class="font-bold text-red-600">' . $this->subject->name.'</a>.'
                ]);
            }
        }
        $this->files = null;
        $this->emit('saveAlert', 'Archivos subidos exitosamente.');
    }


    public function render()
    {
        $attachments = $this->subject->fresh()->attachments()->where('name','like','%'.$this->search.'%')->orderBy('name','asc')->get();
        return view('livewire.subjects.subject.attachments',compact('attachments'));
    }
}
