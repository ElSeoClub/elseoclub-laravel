<?php

namespace App\Http\Controllers;

use App\Exports\ExportAsuntos;
use App\Exports\ExportSubjectLaboralThisWeek;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ReportesController extends Controller
{
    public function index(){
        return view('reportes.index');
    }

    public function proximaSemana(){

        $proximoLunes = Carbon::now()->startOfWeek()->addWeek(); // Obtener la fecha del próximo lunes
        $proximoDomingo = $proximoLunes->copy()->addDays(6); // Agregar 6 días para obtener la fecha del próximo domingo
        return Excel::download(new ExportAsuntos(), 'asuntos_ laboral '.$proximoLunes->day.' al '.$proximoDomingo->day.' de '.$proximoDomingo->monthName.' del '.$proximoDomingo->year.'.xlsx');
    }

    public function laboralEstaSemana(){
        $proximoLunes = Carbon::now()->startOfWeek(); // Obtener la fecha del próximo lunes
        $proximoDomingo = $proximoLunes->copy()->addDays(6); // Agregar 6 días para obtener la fecha del próximo domingo
        return Excel::download(new ExportSubjectLaboralThisWeek(), 'asuntos_ laboral '.$proximoLunes->day.' al '.$proximoDomingo->day.' de '.$proximoDomingo->monthName.' del '.$proximoDomingo->year.'.xlsx');
    }
}
