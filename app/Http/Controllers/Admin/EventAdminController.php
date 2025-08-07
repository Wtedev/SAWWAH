<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Country;

class EventAdminController extends Controller
{
    public function index()
    {
        $events = Event::with('country')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('admin.events.form', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'city' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:255',
            'price' => 'nullable|string|max:255',
            'country_id' => 'nullable|exists:countries,id',
            'is_featured' => 'boolean',
        ]);

        Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'city' => $request->city,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
            'price' => $request->price,
            'country_id' => $request->country_id,
            'is_featured' => $request->boolean('is_featured'),
        ]);

        return redirect()->route('admin.events.index')->with('success', 'تم إضافة الفعالية بنجاح');
    }

    public function edit(Event $event)
    {
        $countries = Country::all();
        return view('admin.events.form', compact('event', 'countries'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'city' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:255',
            'price' => 'nullable|string|max:255',
            'country_id' => 'nullable|exists:countries,id',
            'is_featured' => 'boolean',
        ]);

        $event->update([
            'name' => $request->name,
            'description' => $request->description,
            'city' => $request->city,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
            'price' => $request->price,
            'country_id' => $request->country_id,
            'is_featured' => $request->boolean('is_featured'),
        ]);

        return redirect()->route('admin.events.index')->with('success', 'تم تحديث الفعالية بنجاح');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'تم حذف الفعالية بنجاح');
    }
}
