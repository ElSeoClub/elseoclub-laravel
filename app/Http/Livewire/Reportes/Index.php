<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Task;
use Carbon\Carbon;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $proximoLunes = Carbon::now()->startOfWeek()->addWeek(); // Obtener la fecha del próximo lunes
        $proximoDomingo = $proximoLunes->copy()->addDays(6); // Agregar 6 días para obtener la fecha del próximo domingo

        $actuaciones = Task::whereBetween('fecha', [$proximoLunes, $proximoDomingo])
                           ->whereHas('subject.matter', function($query) {
                               $query->where('id', 24);
                           })
                           ->with('subject')
                           ->orderBy('fecha', 'asc')
                           ->get();

        foreach($actuaciones as $actuacion) {
            dd( unserialize( $actuacion->subject->metadata ) );
        }
        return view('livewire.reportes.index');
    }
}
