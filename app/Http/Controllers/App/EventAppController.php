<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Vote;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventAppController extends Controller
{
    public function index()
    {
        $events = Event::where('visibility', 1)
            ->where('is_active', 1)
            ->where('end_time', '>', Carbon::now())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('app.event.index', compact('events'));
    }

    public function information($id)
    {
        $event = Event::where('id', $id)
            ->where('visibility', 1)
            ->where('is_active', 1)
            ->firstOrFail();

        $now = Carbon::now();
        $canVote = false;
        if ($now->greaterThanOrEqualTo($event->start_time) && $now->lessThan($event->end_time)) {
            $canVote = true;
        }

        $candidates = $event->candidates;

        return view('app.event.information', compact('event', 'candidates', 'canVote'));
    }

    public function voting($id)
    {
        $event = Event::where('id', $id)
            ->where('visibility', 1)
            ->where('is_active', 1)
            ->firstOrFail();

        $now = Carbon::now();

        if ($now->lessThan($event->start_time) || $now->greaterThanOrEqualTo($event->end_time)) {
            return redirect()->route('app.event.information', $event->id)->with('error', 'Voting is not currently open for this event.');
        }

        $candidates = $event->candidates;

        $hasVoted = Auth::check() && Vote::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->exists();

        return view('app.voting.index', compact('event', 'candidates', 'hasVoted'));
    }

    public function storeVote(Request $request)
    {
        $request->validate([
            'event_id' => ['required', 'uuid'],
            'candidate_id' => ['required', 'uuid'],
        ]);

        $event = Event::where('id', $request->event_id)
            ->where('visibility', 1)
            ->where('is_active', 1)
            ->firstOrFail();

        $now = Carbon::now();

        if ($now->lessThan($event->start_time) || $now->greaterThanOrEqualTo($event->end_time)) {
            return redirect()->route('app.event.information', $event->id)->with('error', 'Voting is not currently open for this event.');
        }

        $existingVote = Vote::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->first();

        if ($existingVote) {
            return redirect()->route('app.event.information', $event->id)->with('error', 'Anda sudah pernah melakukan vote di event ini.');
        }

        Vote::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'candidate_id' => $request->candidate_id,
            'latitude' => $request->latitude ?? 0.0,
            'longitude' => $request->longitude ?? 0.0,
        ]);

        return redirect()->route('app.event.information', $event->id)->with('success', 'Vote Anda berhasil direkam!');
    }

    public function success(Request $request)
    {
        return view('app.voting.success');
    }
}