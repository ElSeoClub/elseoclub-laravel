<?php

namespace App\Exports;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ExportTribunalNow implements FromView
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
                               $query->where('id', 13);
                           })->orderBy('fecha','asc')
                           ->get();

        return view('export.ExportTribunalNow',
            [
                'actuaciones' => $actuaciones
            ]);
    }
}
