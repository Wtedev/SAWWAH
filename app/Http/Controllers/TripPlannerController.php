<?php

namespace App\Http\Controllers;

use App\Models\Country; // لاستيراد النموذج الخاص بالدول
use Carbon\Carbon; // لاستخدام مكتبة Carbon لحساب الفروقات بين التواريخ
use Illuminate\Http\Request;

class TripPlannerController extends Controller
{
    public function index(Request $request)
    {
        // جلب كل الدول من قاعدة البيانات
        $countries = Country::all(); 

        // التحقق من وجود التواريخ في الطلب
        $tripDays = null;
        if ($request->has('departure_date') && $request->has('return_date') && $request->departure_date && $request->return_date) {
            // إذا كانت التواريخ موجودة، نحسب الفارق بينهما
            $departureDate = Carbon::parse($request->departure_date);
            $returnDate = Carbon::parse($request->return_date);
            $tripDays = $departureDate->diffInDays($returnDate); // حساب الفرق بين التواريخ
        }

        // جمع الميزانية
        $transportBudget = $request->input('transport_budget', 0);
        $foodBudget = $request->input('food_budget', 0);
        $entertainmentBudget = $request->input('entertainment_budget', 0);
        $totalBudget = $transportBudget + $foodBudget + $entertainmentBudget;

        // تمرير البيانات إلى الـ View
        return view('trip-planner.index', compact('countries', 'tripDays', 'transportBudget', 'foodBudget', 'entertainmentBudget', 'totalBudget'));
    }
}
