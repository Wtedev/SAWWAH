<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherController extends Controller
{
    /**
     * جلب بيانات الطقس باستخدام اسم العاصمة
     */
    public function getWeatherByCapital(Request $request): JsonResponse
    {
        $request->validate([
            'capital' => 'required|string|min:2'
        ]);

        $capital = trim($request->input('capital'));

        try {
            // استخدام OpenWeatherMap API
            $apiKey = env('OPENWEATHER_API_KEY');

            if (!$apiKey) {
                return $this->getDefaultWeatherData($capital);
            }

            $weatherQuery = [
                'q' => $capital,
                'appid' => $apiKey,
                'units' => 'metric', // درجة الحرارة بالمئوي
                'lang' => 'ar' // الوصف بالعربية
            ];

            Log::info("Fetching weather for capital: " . $capital);

            $weatherResponse = Http::timeout(10)->get("https://api.openweathermap.org/data/2.5/weather", $weatherQuery);

            if ($weatherResponse->successful()) {
                $weatherData = $weatherResponse->json();

                if (!isset($weatherData['main']) || !isset($weatherData['weather']) || empty($weatherData['weather'])) {
                    Log::error("Invalid weather data structure: " . json_encode($weatherData));
                    return $this->getDefaultWeatherData($capital);
                }

                return response()->json([
                    'success' => true,
                    'temp' => round($weatherData['main']['temp']) . '°C',
                    'condition' => $this->translateCondition($weatherData['weather'][0]['description']),
                    'humidity' => $weatherData['main']['humidity'] ?? 0,
                    'city_found' => $weatherData['name'] ?? $capital,
                    'wind_speed' => isset($weatherData['wind']['speed']) ? round($weatherData['wind']['speed']) : 0
                ]);
            } else {
                Log::warning("OpenWeather API failed for {$capital}: " . $weatherResponse->body());
                return $this->getWeatherFromBackupAPI($capital);
            }
        } catch (\Exception $e) {
            Log::error("Weather API Exception for {$capital}: " . $e->getMessage());
            return $this->getDefaultWeatherData($capital);
        }
    }

    /**
     * API بديل في حالة فشل الرئيسي
     */
    private function getWeatherFromBackupAPI(string $capital): JsonResponse
    {
        try {
            // محاولة استخدام API مجاني آخر أو WeatherAPI
            $apiKey = env('WEATHERAPI_KEY');

            if ($apiKey) {
                $response = Http::timeout(10)->get("http://api.weatherapi.com/v1/current.json", [
                    'key' => $apiKey,
                    'q' => $capital,
                    'aqi' => 'no'
                ]);

                if ($response->successful()) {
                    $weatherData = $response->json();

                    return response()->json([
                        'success' => true,
                        'temp' => round($weatherData['current']['temp_c']) . '°C',
                        'condition' => $this->translateCondition($weatherData['current']['condition']['text']),
                        'humidity' => $weatherData['current']['humidity'],
                        'city_found' => $weatherData['location']['name'],
                        'wind_speed' => round($weatherData['current']['wind_kph'])
                    ]);
                }
            }

            return $this->getDefaultWeatherData($capital);
        } catch (\Exception $e) {
            Log::error('Backup Weather API Error: ' . $e->getMessage());
            return $this->getDefaultWeatherData($capital);
        }
    }

    /**
     * بيانات طقس افتراضية للمدن الرئيسية
     */
    private function getDefaultWeatherData(string $capital): JsonResponse
    {
        $defaultData = [
            'riyadh' => ['temp' => '28°C', 'condition' => 'مشمس'],
            'jeddah' => ['temp' => '32°C', 'condition' => 'حار ومشمس'],
            'dammam' => ['temp' => '30°C', 'condition' => 'مشمس'],
            'mecca' => ['temp' => '35°C', 'condition' => 'حار جداً'],
            'medina' => ['temp' => '33°C', 'condition' => 'حار ومشمس'],
            'dubai' => ['temp' => '32°C', 'condition' => 'حار ومشمس'],
            'abu dhabi' => ['temp' => '31°C', 'condition' => 'حار ومشمس'],
            'doha' => ['temp' => '30°C', 'condition' => 'مشمس'],
            'kuwait city' => ['temp' => '35°C', 'condition' => 'حار جداً'],
            'kuwait' => ['temp' => '35°C', 'condition' => 'حار جداً'],
            'manama' => ['temp' => '29°C', 'condition' => 'مشمس'],
            'muscat' => ['temp' => '33°C', 'condition' => 'حار ومشمس'],
            'cairo' => ['temp' => '25°C', 'condition' => 'معتدل'],
            'london' => ['temp' => '15°C', 'condition' => 'غائم جزئياً'],
            'paris' => ['temp' => '18°C', 'condition' => 'معتدل'],
            'istanbul' => ['temp' => '20°C', 'condition' => 'معتدل'],
            'new york' => ['temp' => '22°C', 'condition' => 'معتدل'],
            'tokyo' => ['temp' => '24°C', 'condition' => 'معتدل']
        ];

        $key = strtolower(trim($capital));
        $weather = $defaultData[$key] ?? ['temp' => '25°C', 'condition' => 'معتدل'];

        Log::info("Using default weather data for: " . $capital);

        return response()->json([
            'success' => true,
            'temp' => $weather['temp'],
            'condition' => $weather['condition'],
            'message' => 'تم استخدام بيانات تقديرية للطقس',
            'city_found' => $capital
        ]);
    }

    /**
     * ترجمة أوصاف الطقس إلى العربية
     */
    private function translateCondition(string $condition): string
    {
        $translations = [
            'clear sky' => 'سماء صافية',
            'few clouds' => 'غيوم قليلة',
            'scattered clouds' => 'غيوم متناثرة',
            'broken clouds' => 'غيوم كثيفة',
            'overcast clouds' => 'ملبد بالغيوم',
            'shower rain' => 'زخات مطر',
            'rain' => 'مطر',
            'light rain' => 'مطر خفيف',
            'moderate rain' => 'مطر متوسط',
            'heavy intensity rain' => 'مطر غزير',
            'thunderstorm' => 'عاصفة رعدية',
            'snow' => 'ثلج',
            'mist' => 'ضباب خفيف',
            'fog' => 'ضباب',
            'haze' => 'غبار',
            'dust' => 'عاصفة ترابية',
            'sunny' => 'مشمس',
            'partly cloudy' => 'غائم جزئياً',
            'cloudy' => 'غائم',
            'clear' => 'صافي',
            'drizzle' => 'رذاذ'
        ];

        $lowerCondition = strtolower($condition);

        foreach ($translations as $english => $arabic) {
            if (str_contains($lowerCondition, $english)) {
                return $arabic;
            }
        }

        return $condition; // إرجاع النص الأصلي إذا لم توجد ترجمة
    }

    /**
     * الطريقة القديمة للتوافق مع النظام السابق (deprecated)
     */
    public function getWeatherByCountryCode(Request $request)
    {
        // تحويل للطريقة الجديدة
        $request->validate([
            'country_code' => 'required|string|size:2'
        ]);

        // قائمة العواصم حسب كود الدولة
        $capitals = [
            'SA' => 'Riyadh',
            'AE' => 'Abu Dhabi',
            'QA' => 'Doha',
            'KW' => 'Kuwait City',
            'BH' => 'Manama',
            'OM' => 'Muscat',
            'EG' => 'Cairo',
            'GB' => 'London',
            'FR' => 'Paris',
            'TR' => 'Istanbul',
            'US' => 'New York',
            'JP' => 'Tokyo'
        ];

        $countryCode = strtoupper($request->country_code);
        $capital = $capitals[$countryCode] ?? 'Riyadh';

        $newRequest = new Request(['capital' => $capital]);
        return $this->getWeatherByCapital($newRequest);
    }
}
