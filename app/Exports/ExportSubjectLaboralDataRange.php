<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Carbon\Carbon;

class ExportSubjectLaboralDataRange implements FromView
{
    public function __construct(public $start, public $end)
    {
    }

    public function view(): View
    {

        $start = Carbon::createFromFormat('d/m/Y', $this->start);
        $end = Carbon::createFromFormat('d/m/Y', $this->end)->addDay();
        $actuaciones = Task::whereBetween('fecha', [$this->start, $this->end])->with('subject')->orderBy('fecha','asc')
                           ->get();

        return view('export.ExportSubjectLaboralThisWeek',
            [
                'actuaciones' => $actuaciones
            ]);
    }
}
