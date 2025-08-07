<?php

/**
 * ملف اختبار لـ Weather API
 * 
 * هذا الملف يمكن استخدامه لاختبار API الطقس مباشرة
 * يمكن تشغيله من المتصفح: yoursite.com/test-weather
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::get('/test-weather', function () {
    $weatherController = new WeatherController();

    // اختبار مدن مختلفة
    $cities = [
        'Riyadh',
        'Dubai',
        'London',
        'Cairo',
        'Paris'
    ];

    $results = [];

    foreach ($cities as $city) {
        $request = new \Illuminate\Http\Request(['capital' => $city]);
        $response = $weatherController->getWeatherByCapital($request);
        $results[$city] = json_decode($response->getContent(), true);
    }

    return view('test-weather', compact('results'));
})->name('test.weather');
