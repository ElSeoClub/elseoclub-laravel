<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportSubjectLaboralDataRange implements FromView
{
    public function __construct(public $start, public $end)
    {
    }

    public function view(): View
    {
        $actuaciones = Task::whereBetween('fecha', [$this->start, $this->end])->with('subject')->orderBy('fecha','asc')
                           ->get();

        return view('export.ExportSubjectLaboralThisWeek',
            [
                'actuaciones' => $actuaciones
            ]);
    }
}
