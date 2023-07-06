<?php

namespace App\Exports;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ExportSubjectLaboralThisWeek implements FromView
{
    public function view(): View
    {
        $proximoLunes = Carbon::now()->startOfWeek(); // Obtener la fecha del próximo lunes
        $proximoDomingo = $proximoLunes->copy()->addDays(6); // Agregar 6 días para obtener la fecha del próximo domingo

        $actuaciones = Task::whereBetween('fecha', [$proximoLunes, $proximoDomingo])->with('subject')->orderBy('fecha','asc')
                           ->get();


        return view('export.ExportSubjectLaboralThisWeek',
            [
                'actuaciones' => $actuaciones
            ]);
    }
}
