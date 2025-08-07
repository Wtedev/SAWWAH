<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;

class HomeController extends Controller
{
    public function index()
    {
        // جلب الدول بشكل عشوائي
        $popularCountries = Country::inRandomOrder()->take(8)->get();
        
        return view('home', compact('popularCountries'));
    }
}
