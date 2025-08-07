<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Services\WeatherService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TripPlannerController extends Controller
{
    public function index(Request $request)
    {
        // جلب كل الدول من قاعدة البيانات
        $countries = Country::all();

        // التحقق من وجود التواريخ في الطلب
        $tripDays = null;
        $trip = null;
        $selectedCountry = null;
        $weatherForecast = null;
        $countryEvents = null;
        $numberOfPeople = (int) $request->input('number_of_people', 1);

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

            // جلب بيانات الدولة المختارة
            $selectedCountry = Country::find($validated['destination']);

            // جلب الفعاليات المرتبطة بالدولة
            if ($selectedCountry) {
                $countryEvents = $selectedCountry->events()->take(5)->get();
            }

            // جلب بيانات الطقس للدولة المختارة
            if ($selectedCountry && $selectedCountry->capital) {
                try {
                    $weatherService = app(WeatherService::class);
                    $weatherForecast = $weatherService->getForecast(
                        $selectedCountry->name,
                        $selectedCountry->capital,
                        $validated['departure_date']
                    );

                    // إذا لم نحصل على توقعات، نجرب الطقس الحالي
                    if (!$weatherForecast) {
                        $currentWeather = $weatherService->getWeatherForCity(
                            $selectedCountry->name,
                            $selectedCountry->capital
                        );

                        if ($currentWeather) {
                            $weatherForecast = [
                                'temp' => $currentWeather['temp'],
                                'feels_like' => $currentWeather['feels_like'],
                                'humidity' => $currentWeather['humidity'],
                                'wind_speed' => $currentWeather['wind_speed'],
                                'description' => $currentWeather['description'],
                                'icon' => $currentWeather['icon'],
                                'date' => $validated['departure_date']
                            ];
                        }
                    }
                } catch (\Exception $e) {
                    Log::error('Error fetching weather data: ' . $e->getMessage());
                }
            }

            // إنشاء كائن Trip مؤقت
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
            'trip',
            'selectedCountry',
            'weatherForecast',
            'countryEvents',
            'numberOfPeople'
        ));
    }
}
