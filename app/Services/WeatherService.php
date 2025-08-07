<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

class WeatherService
{
    private $client;
    private $apiKey;

    private $geoClient;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.openweathermap.org/data/2.5/',
            'timeout'  => 5.0,
        ]);
        $this->geoClient = new Client([
            'base_uri' => 'https://api.openweathermap.org/geo/1.0/',
            'timeout'  => 5.0,
        ]);
        $this->apiKey = config('services.openweather.key');
    }

    private function getCityCoordinates(string $city, string $country)
    {
        try {
            $response = $this->geoClient->get('direct', [
                'query' => [
                    'q' => "{$city},{$country}",
                    'limit' => 1,
                    'appid' => $this->apiKey
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            if (!empty($data)) {
                Log::info('Found city coordinates', [
                    'city' => $city,
                    'country' => $country,
                    'coords' => ['lat' => $data[0]['lat'], 'lon' => $data[0]['lon']]
                ]);
                return $data[0];
            }

            Log::error('City not found in geocoding API', [
                'city' => $city,
                'country' => $country
            ]);
            return null;
        } catch (\Exception $e) {
            Log::error('Error getting city coordinates: ' . $e->getMessage());
            return null;
        }
    }

    public function getWeatherForCity(string $country, ?string $city = null)
    {
        $cityName = $city ?? config("countries.countries.{$country}.capital");

        try {
            $cityInfo = $this->getCityCoordinates($cityName, $country);
            if (!$cityInfo) {
                return null;
            }

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
            Log::info('Attempting to fetch weather forecast', [
                'country' => $country,
                'city' => $city,
                'date' => $date
            ]);

            $cityInfo = $this->getCityCoordinates($city, $country);
            if (!$cityInfo) {
                return null;
            }

            Log::info('Using coordinates for forecast', [
                'city' => $city,
                'country' => $country,
                'coords' => ['lat' => $cityInfo['lat'], 'lon' => $cityInfo['lon']]
            ]);

            // Get forecast using coordinates
            $response = $this->client->get('forecast', [
                'query' => [
                    'lat' => $cityInfo['lat'],
                    'lon' => $cityInfo['lon'],
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
