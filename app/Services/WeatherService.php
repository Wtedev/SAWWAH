<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class WeatherService
{
    private $client;
    private $apiKey;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.openweathermap.org/data/2.5/',
            'timeout'  => 5.0,
        ]);
        $this->apiKey = config('services.openweather.key');
    }

    public function getWeatherForCity(string $country)
    {
        // Define capital cities for each country
        $capitals = [
            'SA' => 'Riyadh',
            'AE' => 'Abu Dhabi',
            'BH' => 'Manama',
            'KW' => 'Kuwait City',
            'OM' => 'Muscat',
            'QA' => 'Doha',
        ];

        Log::info('Getting weather for country: ' . $country);

        $city = $capitals[$country] ?? null;
        if (!$city) {
            Log::info('No city found for country: ' . $country);
            return null;
        }

        Log::info('Found city: ' . $city);

        // Cache key based on city name and current hour
        $cacheKey = "weather_{$city}_" . now()->format('Y-m-d-H');

        return Cache::remember($cacheKey, 3600, function () use ($city) {
            try {
                Log::info('Making API request for city: ' . $city);

                $query = [
                    'q' => $city,
                    'appid' => $this->apiKey,
                    'units' => 'metric',
                    'lang' => 'ar'
                ];
                
                Log::info('API Request with parameters:', [
                    'city' => $city,
                    'apiKey' => $this->apiKey
                ]);
                
                $response = $this->client->get('weather', [
                    'query' => $query
                ]);                $data = json_decode($response->getBody(), true);
                Log::info('API Response:', $data);

                if (!isset($data['main']) || !isset($data['weather'][0])) {
                    Log::error('Invalid API response format:', $data);
                    return null;
                }

                $result = [
                    'temp' => round($data['main']['temp']),
                    'feels_like' => round($data['main']['feels_like']),
                    'humidity' => $data['main']['humidity'],
                    'wind_speed' => round($data['wind']['speed'] * 3.6), // تحويل من م/ث إلى كم/س
                    'description' => $data['weather'][0]['description'],
                    'icon' => $data['weather'][0]['icon'],
                ];

                Log::info('Processed weather data:', $result);
                return $result;
            } catch (\Exception $e) {
                Log::error('Error fetching weather data: ' . $e->getMessage(), [
                    'city' => $city,
                    'trace' => $e->getTraceAsString()
                ]);
                return null;
            }
        });
    }
}
