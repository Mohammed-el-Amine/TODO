<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Event;

class EventsController extends Controller
{
    public function show($id)
    {
        $event = Event::find($id);

        // Vérifier si l'événement existe
        if (!$event) {
            abort(404);
        }

        $nextEvent = Event::where('start_date', '>', $event->start_date)
            ->orderBy('start_date')
            ->first();

        return Inertia::render('Event/Show', [
            'event' => [
                'id' => $event->id,
                'title' => $event->title,
                'start_date' => $event->start_date,
                'description' => $event->description,
            ],
            'nextEvent' => [
                'id' => optional($nextEvent)->id,
                'title' => optional($nextEvent)->title,
                'start_date' => optional($nextEvent)->start_date,
                'description' => optional($nextEvent)->description,
            ],
        ]);
    }

    public function create()
    {
        return Inertia::render('Event/Create');
    }
}
