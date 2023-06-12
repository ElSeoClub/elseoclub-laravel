<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Votation;

class CustomvotationController extends Controller
{
    public function index(Event $event)
    {
        return view('customvotation.index', compact('event'));
    }


    public function create(Event $event)
    {
        return view('customvotation.create', compact('event'));
    }

    public function view(Event $event)
    {
        return view('customvotation.view', compact('event'));
    }

    public function votation(Event $event, Votation $votation)
    {
        return view('customvotation.votation', compact('event', 'votation'));
    }

    public function asistencia(Event $event)
    {
        return view('customvotation.asistencia', compact('event'));
    }

    public function votacion(Event $event)
    {
        return view('customvotation.votacion', compact('event'));
    }
}
