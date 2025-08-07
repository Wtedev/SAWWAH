<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventPublicController extends Controller
{
    public function index()
    {
        $featuredEvents = Event::with('country')
            ->where('is_featured', true)
            ->orderBy('start_date')
            ->take(6)
            ->get();

        $upcomingEvents = Event::with('country')
            ->where('start_date', '>=', now())
            ->orderBy('start_date')
            ->take(12)
            ->get();

        return view('events.index', compact('featuredEvents', 'upcomingEvents'));
    }

    public function show(Event $event)
    {
        $event->load('country');
        $relatedEvents = Event::with('country')
            ->where('country_id', $event->country_id)
            ->where('id', '!=', $event->id)
            ->take(3)
            ->get();

        return view('events.show', compact('event', 'relatedEvents'));
    }
}