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
        $start = Carbon::parse($this->start);
        $end = Carbon::parse($this->end)->addDay();
        $actuaciones = Task::whereBetween('fecha', [$start, $end])->with('subject')
            ->whereHas('subject.matter', function($query) {
                $query->where('id', 2);
            })->orderBy('fecha','asc')
                           ->get();

        return view('export.ExportSubjectLaboralThisWeek',
            [
                'actuaciones' => $actuaciones
            ]);
    }
}
