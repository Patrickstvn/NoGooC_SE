<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the comments.
     */
    public function index()
    {
        $comments = Comment::all();
        return response()->json($comments);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'note_id' => 'required|exists:notes,id',
            'content' => 'required|string',
        ]);

        $comment = Comment::create([
            'note_id' => $validatedData['note_id'],
            'content' => $validatedData['content'],
            'user_id' => Auth::id(),
        ]);

        return response()->json($comment, 201);
    }

    
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return view('dashboard', ['comment' => $comment]);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        $validatedData = $request->validate([
            'content' => 'sometimes|required|string',
        ]);

        $comment->update($validatedData);

        return response()->json($comment);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect('/')->with('success', 'Comments deleted successfully!');
    }
}
