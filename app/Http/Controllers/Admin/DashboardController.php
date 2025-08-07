<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Country;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();
        $upcomingEvents = Event::where('start_date', '>=', now())->count();
        $countries = Country::count();
        $featuredEvents = Event::where('is_featured', true)->count();

        return view('admin.dashboard', compact(
            'totalEvents',
            'upcomingEvents',
            'countries',
            'featuredEvents'
        ));
    }
}
