<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

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

    public function getWeatherForCity(string $country, ?string $city = null)
    {
        $cityName = $city ?? config("countries.countries.{$country}.capital");
        
        try {
            $response = $this->client->get('weather', [
                'query' => [
                    'q' => $cityName,
                    'appid' => $this->apiKey,
                    'units' => 'metric',
                    'lang' => 'ar'
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            return [
                'temp' => round($data['main']['temp']),
                'feels_like' => round($data['main']['feels_like']),
                'humidity' => $data['main']['humidity'],
                'wind_speed' => round($data['wind']['speed'] * 3.6),
                'description' => $data['weather'][0]['description'],
                'icon' => $data['weather'][0]['icon'],
            ];

        } catch (\Exception $e) {
            Log::error('Error fetching weather data: ' . $e->getMessage());
            return null;
        }
    }

    public function getForecast(string $country, string $city, string $date)
    {
        try {
            // Get city coordinates first
            $cityData = $this->client->get('weather', [
                'query' => [
                    'q' => $city,
                    'appid' => $this->apiKey,
                ]
            ]);
            
            $cityInfo = json_decode($cityData->getBody(), true);
            
            // Get forecast using coordinates
            $response = $this->client->get('forecast', [
                'query' => [
                    'lat' => $cityInfo['coord']['lat'],
                    'lon' => $cityInfo['coord']['lon'],
                    'appid' => $this->apiKey,
                    'units' => 'metric',
                    'lang' => 'ar'
                ]
            ]);

            $data = json_decode($response->getBody(), true);
            
            // Find forecast for specific date
            $targetDate = Carbon::parse($date)->startOfDay();
            
            foreach ($data['list'] as $forecast) {
                $forecastDate = Carbon::createFromTimestamp($forecast['dt'])->startOfDay();
                
                if ($forecastDate->equalTo($targetDate)) {
                    return [
                        'temp' => round($forecast['main']['temp']),
                        'feels_like' => round($forecast['main']['feels_like']),
                        'humidity' => $forecast['main']['humidity'],
                        'wind_speed' => round($forecast['wind']['speed'] * 3.6),
                        'description' => $forecast['weather'][0]['description'],
                        'icon' => $forecast['weather'][0]['icon'],
                        'date' => $forecastDate->format('Y-m-d'),
                    ];
                }
            }

            return null;

        } catch (\Exception $e) {
            Log::error('Error fetching forecast data: ' . $e->getMessage());
            return null;
        }
    }
}
