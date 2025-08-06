<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventPublicController extends Controller
{
    // عرض جميع الفعاليات
    public function index()
    {
        $events = Event::with('country')->latest()->get();
        return view('event.index', compact('events'));
    }

    // عرض الفعاليات حسب المدينه
    public function filterByCountry($country)
    {
        $events = Event::whereHas('country', function ($query) use ($country) {
            $query->where('name', $country);
        })->get();

        return view('event.index', compact('events'));
    }
}