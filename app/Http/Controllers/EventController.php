<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function legitimations()
    {
        return view('event.legitimation.index');
    }

    public function createLegitimation()
    {
        return view('event.legitimation.create');
    }

    public function legitimation(Event $legitimation)
    {
        return view('event.legitimation.show', compact('legitimation'));
    }
}
