<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Requests\TripPlannerRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TripPlannerController extends Controller
{
    public function index(Request $request)
    {
        // جلب كل الدول من قاعدة البيانات
        $countries = Country::all();

        // التحقق من وجود التواريخ في الطلب
        $tripDays = null;
        $trip = null;

        if ($request->filled(['departure_date', 'return_date', 'destination'])) {
            $validated = $request->validate([
                'destination' => 'required|exists:countries,id',
                'departure_date' => [
                    'required',
                    'date',
                    'after_or_equal:today'
                ],
                'return_date' => [
                    'required',
                    'date',
                    'after_or_equal:departure_date'
                ]
            ], [
                'departure_date.after_or_equal' => 'تاريخ الذهاب يجب أن يكون اليوم أو بعد اليوم',
                'return_date.after_or_equal' => 'تاريخ العودة يجب أن يكون مساوياً أو بعد تاريخ الذهاب'
            ]);

            // إذا كانت التواريخ موجودة وصالحة، نحسب الفارق بينهما
            $departureDate = Carbon::parse($validated['departure_date']);
            $returnDate = Carbon::parse($validated['return_date']);
            $tripDays = $departureDate->diffInDays($returnDate);

            // إنشاء كائن Trip مؤقت لجلب توقعات الطقس
            $trip = new \App\Models\Trip([
                'country_id' => $validated['destination'],
                'start_date' => $departureDate,
                'end_date' => $returnDate
            ]);
        }

        // جمع الميزانية
        $transportBudget = (float) $request->input('transport_budget', 0);
        $foodBudget = (float) $request->input('food_budget', 0);
        $entertainmentBudget = (float) $request->input('entertainment_budget', 0);
        $totalBudget = $transportBudget + $foodBudget + $entertainmentBudget;

        // تمرير البيانات إلى الـ View
        return view('trip-planner.index', compact(
            'countries',
            'tripDays',
            'transportBudget',
            'foodBudget',
            'entertainmentBudget',
            'totalBudget',
            'trip'
        ));
    }
}
