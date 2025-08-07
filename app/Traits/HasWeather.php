<?php

namespace App\Traits;

use App\Services\WeatherService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

trait HasWeather
{
    public function getWeatherAttribute()
    {
        if (!isset($this->country_id)) {
            Log::info('Weather: missing country_id');
            return null;
        }

        $country = \App\Models\Country::find($this->country_id);
        if (!$country || !$country->code || !$country->capital) {
            Log::info('Weather: invalid country data', [
                'country' => $country ? $country->toArray() : 'null'
            ]);
            return null;
        }

        return Cache::remember(
            "weather_{$country->code}_{$country->capital}",
            now()->addHour(),
            function () use ($country) {
                return app(WeatherService::class)->getWeatherForCity(
                    $country->code,
                    $country->capital
                );
            }
        );
    }

    public function getForecastAttribute()
    {
        if (!isset($this->country_id) || !isset($this->start_date)) {
            Log::info('Weather forecast: missing country_id or start_date', [
                'country_id' => $this->country_id ?? 'null',
                'start_date' => $this->start_date ?? 'null'
            ]);
            return null;
        }

        $country = \App\Models\Country::find($this->country_id);
        if (!$country || !$country->code || !$country->capital) {
            Log::info('Weather forecast: invalid country data', [
                'country' => $country ? $country->toArray() : 'null'
            ]);
            return null;
        }

        Log::info('Weather forecast: attempting to get forecast', [
            'country_code' => $country->code,
            'capital' => $country->capital,
            'start_date' => $this->start_date
        ]);

        return Cache::remember(
            "forecast_{$country->code}_{$country->capital}_{$this->start_date}",
            now()->addHour(),
            function () use ($country) {
                $forecast = app(WeatherService::class)->getForecast(
                    $country->code, 
                    $country->capital,
                    $this->start_date
                );
                Log::info('Weather forecast: result', ['forecast' => $forecast]);
                return $forecast;
            }
        );
    }
}
