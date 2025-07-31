<?php

namespace App\Http\Controllers;

use App\Models\Country; // استيراد موديل الدول
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        // استرجاع جميع الدول من قاعدة البيانات
        $countries = Country::all();

        // تمرير المتغير $countries إلى الواجهة
        return view('countries.index', compact('countries'));
    }
}

