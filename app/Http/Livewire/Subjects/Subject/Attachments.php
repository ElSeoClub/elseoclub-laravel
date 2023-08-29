<?php

namespace App\Http\Livewire\Subjects\Subject;

use App\Models\Attachment;
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
    protected $listeners = ['deleteAccepted','restoreAccepted'];
    protected $rules = [
        'attachEditName' => ''
    ];

    public $attachEditId = null;
    public $attachEditName = null;

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


    public function delete(Attachment $attachment){
        $this->emit('alert_confirmation', ['title' => 'Estás seguro de borrar el archivo<br> <span class="text-red-600 font-bold">'.$attachment->name.'</span>', 'word' => 'SI', 'emitTo' => 'subjects.subject.attachments', 'callback' => 'deleteAccepted', 'id' => $attachment->id]);

    }

    public function deleteAccepted(Attachment $attachment){
        if($this->subject->id != $attachment->subject_id) {
            abort(403);
        }
        $attachment->status = 'deleted';
        $attachment->save();
        $this->emit('saveAlert','El archivo '.$attachment->name .' fue eliminado exitosamente.');
    }

    public function restore(Attachment $attachment){
        if($this->subject->id != $attachment->subject_id &&  (!Auth::user()->hasPermission('Administrator') || !Auth::user()->hasPermission('Jurídico Global'))) {
            abort(403);
        }
        $this->emit('alert_confirmation', ['title' => 'Estás seguro de restablecer el archivo<br> <span class="text-red-600 font-bold">'.$attachment->name.'</span>', 'word' => 'SI', 'emitTo' => 'subjects.subject.attachments', 'callback' => 'restoreAccepted', 'id' => $attachment->id]);

    }

    public function restoreAccepted(Attachment $attachment){
        if($this->subject->id != $attachment->subject_id &&  (!Auth::user()->hasPermission('Administrator') || !Auth::user()->hasPermission('Jurídico Global'))) {
            abort(403);
        }
        $attachment->status = 'publish';
        $attachment->save();
        $this->emit('saveAlert','El archivo '.$attachment->name .' fue eliminado exitosamente.');
    }

    public function edit(Attachment $attachment)
    {
        $this->attachEditId = $attachment->id;
        $this->attachEditName = $attachment->name;
    }

    public function updateName(){
        $attachment = Attachment::find($this->attachEditId);
        if($this->subject->id != $attachment->subject_id) {
            abort(403);
        }

        if($attachment){
            if($this->attachEditName != ''){
                $attachment->name = $this->attachEditName;
                $attachment->save();
                $this->attachEditName = null;
                $this->attachEditId = null;
                $this->emit('saveAlert');
            }
        }
    }

    public function render()
    {
        if (Auth::user()->hasPermission('Administrator') || Auth::user()->hasPermission('Jurídico Global')) {
            $attachments = $this->subject->fresh()->attachments()->where('name','like','%'.$this->search.'%')->orderBy('name','asc')->get();
        }else{
            $attachments = $this->subject->fresh()->attachments()->where('status','publish')->where('name','like','%'.$this->search.'%')->orderBy('name','asc')->get();
        }
        return view('livewire.subjects.subject.attachments',compact('attachments'));
    }
}
