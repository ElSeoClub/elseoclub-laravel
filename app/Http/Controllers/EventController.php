<?php

namespace App\Http\Controllers;

use App\Models\Door;
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

    public function legitimation(Event $event)
    {
        return view('event.legitimation.show', compact('event'));
    }

    public function legitimationGuests(Event $event)
    {
        return view('event.legitimation.guests', compact('event'));
    }

    public function legitimationLocations(Event $event)
    {
        return view('event.legitimation.locations', compact('event'));
    }

    public function legitimationConfiguration(Event $event)
    {
        return view('event.legitimation.configuration', compact('event'));
    }

    public function legitimationStats(Event $event)
    {
        return view('event.legitimation.stats', compact('event'));
    }

    public function legitimationReports(Event $event)
    {
        return view('event.legitimation.reports', compact('event'));
    }

    public function legitimationAttendance(Event $event)
    {
        return view('event.legitimation.attendance', compact('event'));
    }

    public function legitimationAttendanceScreen(Door $door)
    {
        return view('event.legitimation.attendance.screen', compact('door'));
    }

    public function legitimationVotting(Event $event)
    {
        return view('event.legitimation.votting', compact('event'));
    }

    public function legitimationEvidence(Event $event)
    {
        return view('event.legitimation.evidence', compact('event'));
    }

    public function legitimationArchive(Event $event)
    {
        return view('event.legitimation.archive', compact('event'));
    }
}
