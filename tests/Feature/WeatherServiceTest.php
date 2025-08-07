<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\WeatherService;

class WeatherServiceTest extends TestCase
{
    public function test_can_get_weather_data()
    {
        $weatherService = new WeatherService();

        // اختبار مع مدينة الرياض
        $weatherData = $weatherService->getWeatherForCity('SA');

        // طباعة البيانات للتحقق
        dump('Weather Data for Riyadh:', $weatherData);

        // التأكد من وجود البيانات الأساسية
        $this->assertNotNull($weatherData);
        $this->assertArrayHasKey('temp', $weatherData);
        $this->assertArrayHasKey('description', $weatherData);
    }
}
