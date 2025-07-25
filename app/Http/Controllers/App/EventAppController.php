<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Carbon; // Import Carbon for date/time comparison
use Illuminate\Http\Request;

class EventAppController extends Controller
{
    public function index()
    {
        // Only show public and active events that haven't ended yet
        $events = Event::where('visibility', 1) // 1 for public
            ->where('is_active', 1) // 1 for active
            ->where('end_time', '>', Carbon::now()) // Event has not ended
            ->orderBy('created_at', 'desc')
            ->get();
        return view('app.event.index', compact('events'));
    }

    public function information($id)
    {
        $event = Event::where('id', $id)
            ->where('visibility', 1) // Event must be public
            ->where('is_active', 1) // Event must be active
            ->firstOrFail();

        $now = Carbon::now();
        $canVote = false;
        if ($now->greaterThanOrEqualTo($event->start_time) && $now->lessThan($event->end_time)) {
            $canVote = true;
        }

        // You might want to pass candidates to the information page for a chart or preview
        $candidates = $event->candidates;

        return view('app.event.information', compact('event', 'candidates', 'canVote'));
    }

    public function voting($id)
    {
        $event = Event::where('id', $id)
            ->where('visibility', 1) // Event must be public
            ->where('is_active', 1) // Event must be active
            ->firstOrFail();

        $now = Carbon::now();

        // Check if the current time is within the event's voting period
        if ($now->lessThan($event->start_time) || $now->greaterThanOrEqualTo($event->end_time)) {
            return redirect()->route('app.event.information', $event->id)->with('error', 'Voting is not currently open for this event.');
        }

        $candidates = $event->candidates;
        return view('app.voting.index', compact('event', 'candidates'));
    }

    public function success(Request $request)
    {
        return view('app.voting.success');
    }
}