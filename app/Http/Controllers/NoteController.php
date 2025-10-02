<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\NotesExport; 

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id', auth()->id())->latest()->get();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        $title = "Create Note";
        return view('notes.create', compact('title'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Validation
        $validated = $request->validate([
            'title' => 'required|string|min:5|max:255|unique:notes',
            'body' => 'required|string|min:10',
            'category' => 'nullable|string|max:255',
            'status' => 'required|string|max:255', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Création
        $request->user()->notes()->create($validated);

        return redirect()->route('notes.index')->with('success', 'Note created successfully!');

       if ($request->hasFile('image')) {
    $path = $request->file('image')->store('notes', 'public');
    $validated['image_path'] = $path; // Doit être sauvegardé
}
    }

    public function show(Note $note)
    {
        $title = 'Show Note';
        return view('notes.show', compact(['note', 'title']));
    }

    public function edit(Note $note)
    {
        $this->authorize('update', $note);
        $title = 'Edit Note';
        return view('notes.edit', compact(['note', 'title']));
    }

    public function update(Request $request, Note $note): RedirectResponse
    {
        $this->authorize('update', $note);

        // Validation
        $validated = $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255', Rule::unique('notes')->ignore($note->id)],
            'body' => 'required|string|min:10',
            'category' => 'nullable|string|max:255',
            'status' => 'required|string|max:255', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mise à jour
        $note->update($validated);

        return redirect()->route('notes.index')->with('success', 'Note updated successfully!');


       if ($request->hasFile('image')) {
    $path = $request->file('image')->store('notes', 'public');
    $validated['image_path'] = $path; // Doit être sauvegardé
}
    }

    public function destroy(Note $note): RedirectResponse
    {
        $this->authorize('delete', $note);
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Note deleted successfully!');
    }


public function exportPdf()  // Doit matcher la route [NoteController::class, 'exportPdf']
{
    $notes = auth()->user()->notes()->latest()->get();
    return Pdf::loadView('notes.export-pdf', compact('notes'))
             ->download('notes-'.now()->format('Y-m-d').'.pdf');
}

public function exportExcel()
{
    return Excel::download(new NotesExport(), 'notes-export-'.now()->format('Y-m-d').'.xlsx');
}

public function withImages()
{
    $notes = Note::where('user_id', auth()->id())
                ->whereNotNull('image_path')
                ->latest()
                ->get();
                
    return view('notes.with-images', ['notes' => $notes]);
}
}
