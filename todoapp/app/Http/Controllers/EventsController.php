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

        // Vérifie si l'événement existe
        if (!$my_event) {
            abort(404);
        }
        // dump($my_event);
        return Inertia::render('Event/Show', ["my_event" => $my_event]);
    }


    public function index()
    {
        $my_events = Event::all();

        // dump($my_events);
        if (!$my_events) {
            abort(404);
        }

        return Inertia::render('Event/Index', ["my_events" => $my_events]);
    }

    public function create()
    {
        return Inertia::render('Event/Create');
    }
}
