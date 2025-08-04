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
        $countries = Country::all();
        return view('admin.countries.index', compact('countries'));
    }


    public function create()
    {
        return view('admin.countries.create');
    }
    public function store(Request $request)
    {


      $weather_info = ["temp" => $request->temp, "condition" => $request->condition,];

        $request->file('image')->store();
        Country::create([
            'name' => $request->name,
            'description'=> $request->description,
            'slug' => Str::slug($request->name),
            'weather_info' => $weather_info,
            'currency'=> $request->currency,
            'daily_budget'=> $request->daily_budget,
            'image'=> $request->file('image')->hashName(),
        ]);

        return to_route('admin.countries.index');
    }

    public function edit(Country $country)
    {
        return view('admin.countries.edit', compact('country'));

    }

    public function update(Request $request, Country $country)
    {
        $weather_info = ["temp" => $request->temp, "condition" => $request->condition,];

        $fileName = $country->image;
        if ($request->has('image')){
             $country->image;
            Storage::delete($country->image);
            $fileName = $request->file('image')->store();
        }

        $country->update([
            'name' => $request->name,
            'description'=> $request->description,
            'slug' => Str::slug($request->name),
            'weather_info' => $weather_info,
            'currency'=> $request->currency,
            'daily_budget'=> $request->daily_budget,
            'image'=> $fileName,
        ]);
        return to_route('admin.countries.edit', $country->slug);
    }


    public function destroy(Country $country)
    {

        Storage::delete($country->image);
        $country->delete();
        return to_route('admin.countries.index');
    }
}
