<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EventAppController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        return view('app.event.index', compact('events'));
    }

    public function voting($id)
    {
        $event = Event::where('id', $id)->firstOrFail();
        $candidates = $event->candidates;
        return view('app.voting.index', compact('event', 'candidates'));
    }

    public function success(Request $request)
    {
        return view('app.voting.success');
    }
}
