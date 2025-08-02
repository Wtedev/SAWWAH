<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Models\Trip;
use App\Models\Country; // استيراد موديل الدول
>>>>>>> e80a85e91ffad3608c15fdcb1ee44c0e4ce02437
use Illuminate\Http\Request;

class TripController extends Controller
{
<<<<<<< HEAD
    //
}
=======
    // عرض قائمة الرحلات
    public function index()
    {
        // استرجاع جميع الرحلات من قاعدة البيانات
        $trips = Trip::with('country', 'user')->get(); // جلب الرحلات مع الدولة والمستخدم

        // تمرير الرحلات إلى العرض
        return view('trip-planner.index', compact('trips'));
    }

    // عرض تفاصيل الرحلة
    public function show($id)
    {
        // استرجاع تفاصيل الرحلة باستخدام id
        $trip = Trip::with('country', 'user')->findOrFail($id);

        // تمرير تفاصيل الرحلة إلى العرض
        return view('trip-planner.show', compact('trip'));
    }
}

// إضافة مسار العرض للرحلات
use App\Http\Controllers\TripController;

Route::get('/trips', [TripController::class, 'index'])->name('trips.index');
>>>>>>> e80a85e91ffad3608c15fdcb1ee44c0e4ce02437
