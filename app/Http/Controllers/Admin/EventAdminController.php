<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventAdminController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'is_active' => 'boolean',
            'visibility' => 'boolean',
        ]);

        $event = new Event();
        $event->title = $validated['title'];
        $event->description = $validated['description'];
        $event->start_time = $validated['start_time'];
        $event->end_time = $validated['end_time'];
        $event->is_active = $request->has('is_active') ? 1 : 0;
        $event->visibility = $request->has('visibility') ? 1 : 0;

        if ($request->hasFile('banner_image')) {
            $path = $request->file('banner_image')->store('public/event_banners');
            $event->banner_image = str_replace('public/', '', $path);
        }

        $event->save();

        return redirect()->route('admin.event.index')->with('success', 'Event created successfully.');
    }

    public function show($id)
    {
        $event = Event::where('id', $id)->firstOrFail();
        return view('admin.event.update', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::where('id', $id)->firstOrFail();
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::where('id', $id)->firstOrFail();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'is_active' => 'boolean',
            'visibility' => 'boolean',
        ]);

        $event->title = $validated['title'];
        $event->description = $validated['description'];
        $event->start_time = $validated['start_time'];
        $event->end_time = $validated['end_time'];
        $event->is_active = $request->has('is_active') ? 1 : 0;
        $event->visibility = $request->has('visibility') ? 1 : 0;

        if ($request->hasFile('banner_image')) {
            if ($event->banner_image && Storage::disk('public')->exists($event->banner_image)) {
                Storage::disk('public')->delete($event->banner_image);
            }
            $path = $request->file('banner_image')->store('public/event_banners');
            $event->banner_image = str_replace('public/', '', $path);
        }

        $event->save();

        return redirect()->route('admin.event.index')->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        $event = Event::where('id', $id)->firstOrFail();

        if ($event->banner_image && Storage::disk('public')->exists($event->banner_image)) {
            Storage::disk('public')->delete($event->banner_image);
        }

        $event->delete();

        return redirect()->route('admin.event.index')->with('success', 'Event deleted successfully.');
    }

    public function setup($id)
    {
        $event = Event::where('id', $id)->firstOrFail();
        $candidates = $event->candidates;
        return view('admin.candidate.index', compact('event', 'candidates'));
    }
}