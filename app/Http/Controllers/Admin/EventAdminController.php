<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class AdminEventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.form');
    }

    public function store(Request $request)
    {
        Event::create($request->all());
        return redirect()->route('admin.events.index');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.form', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());
        return redirect()->route('admin.events.index');
    }
}
