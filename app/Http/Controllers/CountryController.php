<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Models\Country; // استيراد موديل الدول
>>>>>>> e80a85e91ffad3608c15fdcb1ee44c0e4ce02437
use Illuminate\Http\Request;

class CountryController extends Controller
{
<<<<<<< HEAD
    //
}
=======
    public function index()
    {
        // استرجاع جميع الدول من قاعدة البيانات
        $countries = Country::all();

        // تمرير المتغير $countries إلى الواجهة
        return view('countries.index', compact('countries'));
    }
}

>>>>>>> e80a85e91ffad3608c15fdcb1ee44c0e4ce02437
