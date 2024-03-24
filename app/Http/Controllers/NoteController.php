<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Заметки';
        $notes = Note::orderBy('id', 'DESC')->get();

        return view('index', compact('title', 'notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Добваить заметку';
        return view('create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (!$request->ajax()) {
            abort(404);
        }
        $request->validate([
            'title' => 'required|min:2',
            'content' => 'required|min:5',
        ]);

        $note = $request->all();
        $noteCopy = Note::create($note);

        return $noteCopy;
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $note = Note::find($id);
        if (!$note) {
            return abort(404);
        }
        $title = 'Изменит заметку' . $note->title;
        return view('edit', compact('title', 'note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|min:2',
            'content' => 'required|min:5',
        ]);

        $note = Note::find($id);
        $data = $request->all();

        $note->update($data);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Note::destroy($id);
        return redirect()->route('home');
    }
}
