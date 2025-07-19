<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Candidate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EventAdminController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        return view('admin.event.index', compact('events'));
    }

    public function show($id)
    {
        $event = event::findOrFail($id);
        return response()->json($event);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'status' => 1,
        ]);

        event::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'event created successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'status' => 'required|string',
        ]);

        $event = event::findOrFail($id);

        $event->name = $request->input('name', $event->name);
        $event->description = $request->input('description', $event->description);
        $event->start_time = $request->input('start_time', $event->start_time);
        $event->end_time = $request->input('end_time', $event->end_time);
        $event->status = $request->input('status', $event->status);
        $event->save();

        return redirect()->back()->with('success', 'event updated successfully!');
    }

    public function setup($id)
    {
        // $event = Event::where('id', $id)->firstOrFail();
        // $candidates = $event->candidat;

        return view('admin.candidate.index');
    }

    public function destroy($id)
    {
        $event = event::findOrFail($id);
        $event->delete();

        return redirect()->back()->with('success', 'event deleted successfully!');
    }
}
