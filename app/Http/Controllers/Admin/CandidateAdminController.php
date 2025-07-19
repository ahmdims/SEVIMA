<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateAdminController extends Controller
{
    public function index()
    {
        $candidates = Candidate::orderBy('created_at', 'desc')->get();
        return view('admin.candidate.index', compact('candidates'));
    }

    public function show($id)
    {
        $candidate = candidate::findOrFail($id);
        return response()->json($candidate);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        candidate::create([
            'name' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'candidate created successfully!');
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

        $candidate = candidate::findOrFail($id);

        $candidate->name = $request->input('name', $candidate->name);
        $candidate->description = $request->input('description', $candidate->description);
        $candidate->start_time = $request->input('start_time', $candidate->start_time);
        $candidate->end_time = $request->input('end_time', $candidate->end_time);
        $candidate->status = $request->input('status', $candidate->status);
        $candidate->save();

        return redirect()->back()->with('success', 'candidate updated successfully!');
    }

    public function destroy($id)
    {
        $candidate = candidate::findOrFail($id);
        $candidate->delete();

        return redirect()->back()->with('success', 'candidate deleted successfully!');
    }
}
