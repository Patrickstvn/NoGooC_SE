<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the notes.
     */
    public function index()
    {
    
    $notes = Note::with('comments')->get();
    
    return view('dashboard', ['notes' => $notes]); 
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note = Note::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'user_id' => Auth::id(),
        ]);

        return redirect('/')->with('success', 'Entri data berhasil');
    }

public function update(Request $request, $id)
{
    $note = Note::findOrFail($id);

    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    $note->update($validatedData);

    return redirect('/')->with('success', 'Edit data berhasil');
}

    /**
     * Remove the specified note from storage.
     */
    public function destroy($id)
    {
    $note = Note::findOrFail($id);
    $note->delete();

    return redirect('/')->with('success', 'Note deleted successfully!');
    }
}
