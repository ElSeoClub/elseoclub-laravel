<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Task;
use Carbon\Carbon;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.reportes.index');
    }
}
