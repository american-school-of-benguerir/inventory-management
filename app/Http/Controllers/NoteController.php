<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Device;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // Show all notes
    public function index()
    {
        $notes = Note::with(['device', 'user'])->get();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        $devices = Device::all();
        return view('notes.create', compact('devices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'note' => 'required|string',
            'device_id' => 'required|exists:devices,id',
        ]);

        Note::create([
            'note' => $request->note,
            'device_id' => $request->device_id,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('notes.index')->with('success', 'Note created successfully!');
    }

    public function edit($id)
    {
        $note = Note::findOrFail($id);
        $devices = Device::all();
        return view('notes.edit', compact('note', 'devices'));
    }

    // Update a note
    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);

        $request->validate([
            'note' => 'required|string',
        ]);

        $note->update([
            'note' => $request->note,
            'device_id' => $request->device_id,
        ]);

        return redirect()->route('notes.index')->with('success', 'Note updated successfully!');
    }

    // Delete a note
    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted successfully!');
    }
}
