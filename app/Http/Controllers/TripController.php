<?php

namespace App\Http\Controllers;



use App\Models\Trip;
use App\Models\Country; // استيراد موديل الدول
use Illuminate\Http\Request;

class TripController extends Controller
{

    //


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


