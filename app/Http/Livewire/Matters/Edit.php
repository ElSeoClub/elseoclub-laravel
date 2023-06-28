<?php

namespace App\Http\Livewire\Matters;

use App\Models\Matter;
use App\Models\MatterBlock;
use Livewire\Component;

class Edit extends Component
{
    public $matter;

    protected $rules = [
        'matter.name'   => 'required',
        'matter.status' => 'required',
        'matter.task_types' => 'required'
    ];

    public function mount(Matter $matter){

    }

    public function save(){
        $this->validate([
            'matter.name'   => 'required|unique:matters,name,'.$this->matter->id,
            'matter.status' => 'required'
        ]);
        $this->matter->save();
        $this->emit('alert', 'Los datos fueron guardados exitosamente.');
    }


    public function addBlock(){

        $this->matter->blocks()->create([
            'position' => $this->matter->blocks()->count()
        ]);
        $this->matter->fresh()->blocks;
        $this->emit('alert', 'Bloque agregado exitosamente');
    }

    public function moveUpBlock(MatterBlock $block){
        if($block->position == 0){
            $this->emit('alert', 'Error al subir el elemento.');
        }else{

            #Movemos el bloque superior a la posición del bloque actual
            $upperBlock = $this->matter->blocks()->where('position',$block->position-1)->first();
            if($upperBlock){
                $upperBlock->position = $block->position;
                $upperBlock->save();
            }

            #Movemos el bloque actual a la posición del bloque superior
            $block->position = $block->position-1;
            $block->save();
        }
    }

    public function moveDownBlock(MatterBlock $block){
        if($block->position+1 == $this->matter->blocks()->count()){
            $this->emit('alert', 'Error al bajar el elemento.');
        }else{
            #Movemos el bloque inferior a la posición del bloque actual
            $upperBlock = $this->matter->blocks()->where('position',$block->position+1)->first();
            if($upperBlock){
                $upperBlock->position = $block->position;
                $upperBlock->save();
            }
            #Movemos el bloque actual a la posición del bloque superior
            $block->position = $block->position+1;
            $block->save();
        }
    }

    public function render()
    {
        return view('livewire.matters.edit');
    }
}
