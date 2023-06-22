<?php

namespace App\Exports;

use App\Models\Asunto;
use App\Models\Actuacion;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class ExportAsuntos implements FromView
{
    public function view(): View
    {
        $proximoLunes = Carbon::now()->startOfWeek()->addWeek(); // Obtener la fecha del próximo lunes
        $proximoDomingo = $proximoLunes->copy()->addDays(6); // Agregar 6 días para obtener la fecha del próximo domingo

        $actuaciones = Actuacion::whereBetween('fecha', [$proximoLunes, $proximoDomingo])->with('asunto')->orderBy('fecha','asc')
                     ->get();


        return view('export.exportAsuntos',
        [
            'actuaciones' => $actuaciones
        ]);
    }
}
