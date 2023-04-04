<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Event;

class EventsController extends Controller
{
    public function show($id)
    {
        $my_event = Event::find($id);

        if (!$my_event) {
            abort(404);
        }
        return Inertia::render('Event/Show', ["my_event" => $my_event]);
    }

    public function index()
    {
        $my_events = Event::all();

        if (!$my_events) {
            abort(404);
        }
        return Inertia::render('Event/Index', ["my_events" => $my_events]);
    }

    public function create()
    {
        return Inertia::render('Event/Create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'description' => 'required|string',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Event::create($validatedData);

        return redirect()->route('events.index')->with('success', 'L\'évènement crée avec succès!');
    }

    public function destroy($id)
    {
        $my_event = Event::find($id);

        if (!$my_event) {
            abort(404);
        }
        $my_event->delete();

        return redirect()->route('events.index')->with('success', 'L\'événement a été supprimé avec succès.');
    }

    public function update(Request $request, $id)
    {
        $my_event = Event::find($id);

        if (!$my_event) {
            abort(404);
        }
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'description' => 'required|string',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $my_event->update($validatedData);

        return redirect()->route('events.show', ['id' => $my_event->id])->with('success', 'L\'événement a été mis à jour avec succès.');
    }

    public function edit($id)
    {
        $my_event = Event::find($id);

        if (!$my_event) {
            abort(404);
        }
        return Inertia::render('Event/Update', ['my_event' => $my_event]);
    }
}
