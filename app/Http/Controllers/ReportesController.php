<?php

namespace App\Http\Controllers;

use App\Exports\ExportAsuntos;
use Maatwebsite\Excel\Facades\Excel;

class ReportesController extends Controller
{
    public function index(){
        return view('reportes.index');
    }

    public function proximaSemana(){
        return Excel::download(new ExportAsuntos(), 'users.xlsx');
    }
}
