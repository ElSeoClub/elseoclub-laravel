<?php

namespace App\Http\Controllers;

use App\Models\Consejo\Consulta;
use App\Models\Event;
use Illuminate\Http\Request;

class ConsejoController extends Controller
{
    public function stats(Event $event, $consulta = 0)
    {
        return view('consejo.stats', compact('event', 'consulta'));
    }

    public function votaciones(Event $event)
    {

        return view('consejo.votaciones', compact('event'));
    }

    public function nuevo(Event $event)
    {
        return view('consejo.nuevo', compact('event'));
    }

    public function registro(Event $event, Consulta $consulta)
    {
        return view('consejo.registro', compact('event', 'consulta'));
    }
}
