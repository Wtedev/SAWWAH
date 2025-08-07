<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherController extends Controller
{
    public function getWeatherByCountryCode(Request $request)
    {
        $request->validate([
            'country_code' => 'required|string|size:2',
            'postal_code' => 'nullable|string|max:20'
        ]);

        $countryCode = strtoupper($request->country_code);
        $postalCode = $request->postal_code;
        
        try {
            // إضافة timeout لـ HTTP requests
            $countryResponse = Http::timeout(10)->get("https://restcountries.com/v3.1/alpha/{$countryCode}");
            
            if (!$countryResponse->successful()) {
                Log::error("Failed to get country data: " . $countryResponse->body());
                return response()->json(['error' => 'لم يتم العثور على بيانات الدولة'], 404);
            }

            $countryDataArray = $countryResponse->json();
            if (empty($countryDataArray)) {
                return response()->json(['error' => 'لا توجد بيانات لهذه الدولة'], 404);
            }

            $countryData = $countryDataArray[0];
            
            if (!isset($countryData['capital']) || empty($countryData['capital'])) {
                return response()->json(['error' => 'لا توجد عاصمة محددة لهذه الدولة'], 404);
            }

            $capital = $countryData['capital'][0];
            $countryName = $countryData['name']['common'] ?? '';

            // الحصول على بيانات الطقس
            $apiKey = env('OPENWEATHER_API_KEY');
            if (!$apiKey) {
                return response()->json(['error' => 'مفتاح API غير مُعرّف'], 500);
            }

            // تحديد الموقع للطقس: إذا كان هناك رمز بريدي، استخدمه مع كود الدولة، وإلا استخدم العاصمة
            $weatherQuery = [
                'appid' => $apiKey,
                'units' => 'metric',
                'lang' => 'ar'
            ];

            $locationUsed = '';
            
            if ($postalCode) {
                $weatherQuery['zip'] = $postalCode . ',' . $countryCode;
                $locationUsed = "الرمز البريدي: {$postalCode}";
            } else {
                $weatherQuery['q'] = $capital;
                $locationUsed = "العاصمة: {$capital}";
            }

            Log::info("Fetching weather with query: " . json_encode($weatherQuery));

            $weatherResponse = Http::timeout(10)->get("https://api.openweathermap.org/data/2.5/weather", $weatherQuery);

            // إذا فشل البحث بالرمز البريدي، جرب بالعاصمة
            if (!$weatherResponse->successful() && $postalCode) {
                Log::warning("Postal code failed, trying with capital: " . $capital);
                $weatherQuery = [
                    'q' => $capital,
                    'appid' => $apiKey,
                    'units' => 'metric',
                    'lang' => 'ar'
                ];
                $weatherResponse = Http::timeout(10)->get("https://api.openweathermap.org/data/2.5/weather", $weatherQuery);
                $locationUsed = "العاصمة: {$capital}";
            }
            
            if (!$weatherResponse->successful()) {
                Log::error("Weather API failed: " . $weatherResponse->body());
                return response()->json(['error' => 'لم يتم العثور على بيانات الطقس'], 404);
            }

            $weatherData = $weatherResponse->json();

            if (!isset($weatherData['main']) || !isset($weatherData['weather']) || empty($weatherData['weather'])) {
                Log::error("Invalid weather data structure: " . json_encode($weatherData));
                return response()->json(['error' => 'بيانات الطقس غير مكتملة'], 404);
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'country_name' => $countryName,
                    'capital' => $capital,
                    'location_used' => $locationUsed,
                    'temperature' => round($weatherData['main']['temp']),
                    'condition' => $weatherData['weather'][0]['description'],
                    'humidity' => $weatherData['main']['humidity'] ?? 0,
                    'feels_like' => round($weatherData['main']['feels_like'] ?? $weatherData['main']['temp'])
                ]
            ]);

        } catch (\Exception $e) {
            Log::error("Weather API Exception: " . $e->getMessage());
            return response()->json(['error' => 'حدث خطأ في جلب البيانات: ' . $e->getMessage()], 500);
        }
    }
}
