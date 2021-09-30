<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Door;
use App\Models\Event;
use App\Models\Event\Evidence;
use App\Models\Event\Evidencetype;

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

    public function legitimationVottingLocation(Event $event, Location $location)
    {
        return view('event.legitimation.votting.location', compact('event', 'location'));
    }

    public function legitimationVottingJuridico(Event $event)
    {
        return view('event.legitimation.votting.juridico', compact('event'));
    }

    public function legitimationVottingLocationJuridico(Event $event, Location $location)
    {
        return view('event.legitimation.votting.locationjuridico', compact('event', 'location'));
    }

    public function legitimationVottingConsolidate(Event $event)
    {
        return view('event.legitimation.votting.consolidate', compact('event'));
    }

    public function legitimationArchive(Event $event)
    {
        return view('event.legitimation.archive.index', compact('event'));
    }

    public function legitimationArchiveUpload(Event $event, $location = null)
    {
        if ($location != null) {
            $location = Location::find($location);
        }
        return view('event.legitimation.archive.upload', compact('event', 'location'));
    }

    public function legitimationTeamwork(Event $event)
    {
        return view('event.legitimation.teamwork.index', compact('event'));
    }

    public function legitimationEvidence(Event $event)
    {
        return view('event.legitimation.evidence.index', compact('event'));
    }

    public function legitimationEvidenceEdit(Event $event, Evidence $evidence)
    {
        return view('event.legitimation.evidence.edit', compact('event', 'evidence'));
    }

    public function legitimationEvidenceRequired(Event $event, $location)
    {
        $location = Location::find($location);
        return view('event.legitimation.evidence.required', compact('event', 'location'));
    }

    public function legitimationEvidenceTypes()
    {
        return view('event.legitimation.evidence.types');
    }

    public function legitimationEvidenceTypesCreate()
    {
        return view('event.legitimation.evidence.types.create');
    }

    public function legitimationEvidenceTypesEdit(Evidencetype $evidence)
    {
        return view('event.legitimation.evidence.types.edit', compact('evidence'));
    }
}
