<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class VotingAppController extends Controller
{
    public function index($id)
    {
        $event = Event::where('id', $id)->firstOrFail();
        $candidates = $event->candidates;
        return view('app.event.index', compact('event', 'candidates'));
    }
}
