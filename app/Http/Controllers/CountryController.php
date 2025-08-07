<?php

namespace App\Http\Controllers;

use App\Models\Country; // استيراد موديل الدول
use App\Services\WeatherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CountryController extends Controller
{
    public function index()
    {
        // استرجاع جميع الدول من قاعدة البيانات
        $countries = Country::all();

        // تمرير المتغير $countries إلى الواجهة
        return view('countries.index', compact('countries'));
    }
    
    public function show(Country $country)
    {
        return view('countries.show', compact('country'));
    }
    
    public function updateWeather()
    {
        try {
            $countries = Country::all();
            $weatherService = app(WeatherService::class);
            $updatedCount = 0;
            
            foreach ($countries as $country) {
                if ($country->capital) {
                    $weatherData = $weatherService->getWeatherForCity(
                        $country->name,     // country name
                        $country->capital   // capital city
                    );
                    
                    if ($weatherData) {
                        $country->weather_info = [
                            'temp' => $weatherData['temp'], // already in Celsius from the service
                            'condition' => $this->translateWeatherCondition($weatherData['description'])
                        ];
                        $country->save();
                        $updatedCount++;
                    }
                }
            }
            
            return redirect()->route('countries.index')
                ->with('success', "تم تحديث بيانات الطقس لـ {$updatedCount} دولة بنجاح");
        } catch (\Exception $e) {
            Log::error('Error updating weather data: ' . $e->getMessage());
            return redirect()->route('countries.index')
                ->with('error', 'حدث خطأ أثناء تحديث بيانات الطقس');
        }
    }
    
    private function translateWeatherCondition($condition)
    {
        // The condition is already in Arabic from the API (lang=ar in the API call)
        // but we'll provide a backup translation if needed
        $translations = [
            'Clear' => 'صافي',
            'Clouds' => 'غائم',
            'Rain' => 'ممطر',
            'Drizzle' => 'رذاذ',
            'Thunderstorm' => 'عاصف',
            'Snow' => 'ثلج',
            'Mist' => 'ضباب',
            'Smoke' => 'دخان',
            'Haze' => 'ضباب خفيف',
            'Dust' => 'غبار',
            'Fog' => 'ضباب كثيف',
            'Sand' => 'رملي',
            'Ash' => 'رماد بركاني',
            'Squall' => 'عاصف مفاجئ',
            'Tornado' => 'إعصار'
        ];
        
        // Check if we have an Arabic translation, otherwise return the original condition
        return $translations[$condition] ?? $condition;
    }
}
