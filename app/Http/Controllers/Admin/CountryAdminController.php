<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CountryAdminController extends Controller
{
    public function index()
    {
        $countries = Country::with('events')->get();
        return view('admin.countries.index', compact('countries'));
    }


    public function create()
    {
        return view('admin.countries.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capital' => 'required|string|max:255',
            'description' => 'required|string',
            'currency' => 'required|string|max:255',
            'temp' => 'required|string|max:255',
            'condition' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'best_month_to_travel' => 'nullable|string',
            'preferred_budget' => 'nullable|string',
            'attraction' => 'nullable|string',
            'travel_with' => 'nullable|string',
            'language_preference' => 'nullable|string',
        ]);

        $weather_info = [
            "temp" => $request->temp,
            "condition" => $request->condition,
        ];

        $imagePath = $request->file('image')->store('countries', 'public');

        Country::create([
            'name' => $request->name,
            'capital' => $request->capital,
            'description' => $request->description,
            'slug' => Str::slug($request->name),
            'weather_info' => $weather_info,
            'currency' => $request->currency,
            'image' => $imagePath,
            'best_month_to_travel' => $request->best_month_to_travel,
            'preferred_budget' => $request->preferred_budget,
            'attraction' => $request->attraction,
            'travel_with' => $request->travel_with,
            'language_preference' => $request->language_preference,
        ]);

        return redirect()->route('admin.countries.index')->with('success', 'تم إضافة الدولة بنجاح');
    }

    public function edit(Country $country)
    {
        return view('admin.countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capital' => 'required|string|max:255',
            'description' => 'required|string',
            'currency' => 'required|string|max:255',
            'temp' => 'required|string|max:255',
            'condition' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'best_month_to_travel' => 'nullable|string',
            'preferred_budget' => 'nullable|string',
            'attraction' => 'nullable|string',
            'travel_with' => 'nullable|string',
            'language_preference' => 'nullable|string',
        ]);

        $weather_info = [
            "temp" => $request->temp,
            "condition" => $request->condition,
        ];

        $imagePath = $country->image;
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة
            if ($country->image) {
                Storage::disk('public')->delete($country->image);
            }
            // رفع الصورة الجديدة
            $imagePath = $request->file('image')->store('countries', 'public');
        }

        $country->update([
            'name' => $request->name,
            'capital' => $request->capital,
            'description' => $request->description,
            'slug' => Str::slug($request->name),
            'weather_info' => $weather_info,
            'currency' => $request->currency,
            'image' => $imagePath,
            'best_month_to_travel' => $request->best_month_to_travel,
            'preferred_budget' => $request->preferred_budget,
            'attraction' => $request->attraction,
            'travel_with' => $request->travel_with,
            'language_preference' => $request->language_preference,
        ]);

        return redirect()->route('admin.countries.index')->with('success', 'تم تحديث الدولة بنجاح');
    }


    public function destroy(Country $country)
    {
        // حذف الصورة من التخزين
        if ($country->image) {
            Storage::disk('public')->delete($country->image);
        }

        $country->delete();

        return redirect()->route('admin.countries.index')->with('success', 'تم حذف الدولة بنجاح');
    }
}
