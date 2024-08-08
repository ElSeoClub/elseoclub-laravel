<?php

namespace App\Http\Controllers;

use App\Exports\ExportAsuntos;
use App\Exports\ExportConciliacionPrejudicial;
use App\Exports\ExportSubjectLaboralDataRange;
use App\Exports\ExportSubjectLaboralRange;
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
        return Excel::download(new ExportAsuntos(), 'asuntos_laboral_'.$proximoLunes->day.' al '.$proximoDomingo->day.' de '.$proximoDomingo->monthName.' del '.$proximoDomingo->year.'.xlsx');
    }

    public function laboralEstaSemana(){
        $proximoLunes = Carbon::now()->startOfWeek(); // Obtener la fecha del próximo lunes
        $proximoDomingo = $proximoLunes->copy()->addDays(6); // Agregar 6 días para obtener la fecha del próximo domingo
        return Excel::download(new ExportSubjectLaboralThisWeek(), 'asuntos_laboral_'.$proximoLunes->day.' al '.$proximoDomingo->day.' de '.$proximoDomingo->monthName.' del '.$proximoDomingo->year.'.xlsx');
    }

    public function rangoFechas(){
        return view('reportes.rangofechas');
    }

    public function rangoFechasExcel($start,$end){

        return Excel::download(new ExportSubjectLaboralDataRange($start,$end), 'asuntos_laboral'.$start.'al'.$end.'.xlsx');
    }



    public function conciliacionPrejudicial(){

        $proximoLunes = Carbon::now()->startOfWeek()->addWeek(); // Obtener la fecha del próximo lunes
        $proximoDomingo = $proximoLunes->copy()->addDays(6); // Agregar 6 días para obtener la fecha del próximo domingo
        return Excel::download(new ExportConciliacionPrejudicial(), 'conciliacion_prejudicial_'.$proximoLunes->day.'_al_'.$proximoDomingo->day.'_de_'.$proximoDomingo->monthName.'_del_'.$proximoDomingo->year.'.xlsx');
    }


    public function conciliacionPrejudicialNow(){
        $proximoLunes = Carbon::now()->startOfWeek(); // Obtener la fecha del próximo lunes
        $proximoDomingo = $proximoLunes->copy()->addDays(6); // Agregar 6 días para obtener la fecha del próximo domingo
        return Excel::download(new ExportConciliacionPrejudicialNow(), 'conciliacion_prejudicial_'.$proximoLunes->day.'_al_'.$proximoDomingo->day.'_de_'.$proximoDomingo->monthName.'_del_'.$proximoDomingo->year.'.xlsx');
    }
}
