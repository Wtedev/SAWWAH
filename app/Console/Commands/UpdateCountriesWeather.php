<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Services\WeatherService;
use Illuminate\Console\Command;

class UpdateCountriesWeather extends Command
{
    protected $signature = 'countries:update-weather';
    protected $description = 'Update weather information for all countries';

    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        parent::__construct();
        $this->weatherService = $weatherService;
    }

    public function handle()
    {
        $this->info('Updating weather information for all countries...');

        $countries = Country::whereNotNull('postal_code')
            ->orWhereNotNull('capital')
            ->get();

        $updated = 0;
        $failed = 0;

        foreach ($countries as $country) {
            $this->info("Updating weather for: {$country->name}");

            $weather = $this->weatherService->getWeatherByPostalCodeOrCity(
                $country->postal_code,
                $country->capital
            );

            if ($weather) {
                $country->update([
                    'weather_info' => [
                        'temp' => $weather['temp'],
                        'condition' => $weather['description'],
                        'humidity' => $weather['humidity'],
                        'wind_speed' => $weather['wind_speed'],
                        'feels_like' => $weather['feels_like'],
                        'updated_at' => now()->toISOString()
                    ]
                ]);
                $updated++;
                $this->line("✓ Updated weather for {$country->name}: {$weather['temp']}°C, {$weather['description']}, Humidity: {$weather['humidity']}%");
            } else {
                $failed++;
                $this->error("✗ Failed to get weather for {$country->name}");
            }
        }

        $this->info("Weather update completed!");
        $this->info("Updated: {$updated} countries");
        $this->info("Failed: {$failed} countries");
    }
}
