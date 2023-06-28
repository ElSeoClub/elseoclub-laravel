<?php

namespace App\Http\Livewire\Matters\Block;

use App\Models\MatterBlock;
use Livewire\Component;

class Edit extends Component
{
    public $block;
    public $column_1 = null;
    public $column_2 = null;
    public $column_3 = null;

    protected $rules = [
        'column1.name' => '',
        'column1.type' => '',
        'column1.options' => '',
        'column1.required' => '',
        'column1.status' => ''
    ];

    public function save(){

        $this->block->column_1 = $this->column_1 != null ? serialize($this->column_1): null;
        $this->block->column_2 = $this->column_2 != null ? serialize($this->column_2): null;
        $this->block->column_3 = $this->column_3 != null ? serialize($this->column_3): null;
        $this->block->save();
    }

    public function mount(MatterBlock $block){
        $this->block = $block;
        $this->column_1 = $block->column_1 != null ? unserialize($block->column_1): null;
        $this->column_2 = $block->column_2 != null ? unserialize($block->column_2): null;
        $this->column_3 = $block->column_3 != null ? unserialize($block->column_3): null;
    }

    public function changeBlockStatus(){
        if($this->block->status == 'publish'){
            $this->block->status = 'draft';
        }elseif($this->block->status == 'draft'){
            $this->block->status = 'publish';
        }
        $this->block->save();
    }

    public function render()
    {
        return view('livewire.matters.block.edit');
    }
}
