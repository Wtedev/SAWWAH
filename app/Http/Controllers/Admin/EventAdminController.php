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
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required',
            'image' => 'nullable|image',
            'country_id' => 'required|exists:countries,id',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        Event::create($data);
        return redirect()->route('admin.events.index')->with('success', 'تمت الإضافة');
    }

    public function edit(Event $event)
    {
        $countries = Country::all();
        return view('admin.events.form', compact('event', 'countries'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required',
            'image' => 'nullable|image',
            'country_id' => 'required|exists:countries,id',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($data);
        return redirect()->route('admin.events.index')->with('success', 'تم التحديث');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return back()->with('success', 'تم الحذف');
    }
}