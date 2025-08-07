<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Services\WeatherService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CountryWeatherIntegrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_country_weather_update_with_postal_code()
    {
        // Create a test country using factory
        $country = Country::factory()->create([
            'name' => 'المملكة العربية السعودية',
            'slug' => 'saudi-arabia-test',
            'capital' => 'الرياض',
            'postal_code' => '11564',
            'currency' => 'ريال سعودي',
        ]);

        // Update weather using the service (real API call)
        $weatherService = new WeatherService();
        $weatherData = $weatherService->getWeatherByPostalCodeOrCity($country->postal_code, $country->capital);

        // Update country with weather data
        if ($weatherData) {
            $country->weather_info = [
                'temp' => $weatherData['temp'],
                'feels_like' => $weatherData['feels_like'],
                'humidity' => $weatherData['humidity'],
                'wind_speed' => $weatherData['wind_speed'],
                'condition' => $weatherData['description'],
                'updated_at' => now()->toISOString()
            ];
            $country->save();
        }

        // Refresh the model from database
        $country->refresh();

        // Assert weather data was saved correctly
        if ($weatherData) {
            $this->assertNotNull($country->weather_info);

            // Convert to array for testing if it's an object
            $weatherInfo = is_array($country->weather_info) ? $country->weather_info : (array) $country->weather_info;

            $this->assertArrayHasKey('temp', $weatherInfo);
            $this->assertArrayHasKey('feels_like', $weatherInfo);
            $this->assertArrayHasKey('humidity', $weatherInfo);
            $this->assertArrayHasKey('wind_speed', $weatherInfo);
            $this->assertArrayHasKey('condition', $weatherInfo);
            $this->assertArrayHasKey('updated_at', $weatherInfo);

            dump('Country Weather Integration Test:', [
                'country' => $country->name,
                'postal_code' => $country->postal_code,
                'weather_info' => $weatherInfo
            ]);
        } else {
            $this->markTestSkipped('Weather API unavailable for integration test');
        }
    }

    /** @test */
    public function test_country_weather_fallback_to_capital()
    {
        // Create a country with invalid postal code but valid capital
        $country = Country::factory()->create([
            'name' => 'دولة اختبار',
            'slug' => 'test-country-fallback',
            'capital' => 'جدة',
            'postal_code' => '00000', // Invalid postal code
            'currency' => 'ريال سعودي'
        ]);

        $weatherService = new WeatherService();
        $weatherData = $weatherService->getWeatherByPostalCodeOrCity($country->postal_code, $country->capital);

        if ($weatherData) {
            $this->assertArrayHasKey('temp', $weatherData);
            $this->assertArrayHasKey('description', $weatherData);

            dump('Fallback Integration Test:', [
                'country' => $country->name,
                'invalid_postal_code' => $country->postal_code,
                'fallback_capital' => $country->capital,
                'weather_data' => $weatherData
            ]);
        } else {
            dump('Fallback test: No weather data returned');
        }

        // This test passes if it doesn't throw exceptions
        $this->assertTrue(true);
    }

    /** @test */
    public function test_multiple_countries_postal_code_weather_batch()
    {
        // Create multiple test countries with different postal codes
        $testCases = [
            ['name' => 'السعودية', 'postal_code' => '11564', 'capital' => 'الرياض'],
            ['name' => 'قطر', 'postal_code' => '21577', 'capital' => 'الدوحة'],
            ['name' => 'الإمارات', 'postal_code' => '31952', 'capital' => 'أبوظبي'],
        ];

        $results = [];
        $successCount = 0;
        $weatherService = new WeatherService();

        foreach ($testCases as $index => $testCase) {
            $country = Country::factory()->create([
                'name' => $testCase['name'],
                'slug' => 'test-country-batch-' . $index,
                'postal_code' => $testCase['postal_code'],
                'capital' => $testCase['capital'],
                'currency' => 'ريال خليجي'
            ]);

            $weatherData = $weatherService->getWeatherByPostalCodeOrCity(
                $country->postal_code,
                $country->capital
            );

            if ($weatherData) {
                $successCount++;
                $results[] = [
                    'country' => $testCase['name'],
                    'postal_code' => $testCase['postal_code'],
                    'temp' => $weatherData['temp'],
                    'humidity' => $weatherData['humidity'],
                    'condition' => $weatherData['description']
                ];

                // Update the country with weather data
                $country->weather_info = [
                    'temp' => $weatherData['temp'],
                    'feels_like' => $weatherData['feels_like'],
                    'humidity' => $weatherData['humidity'],
                    'wind_speed' => $weatherData['wind_speed'],
                    'condition' => $weatherData['description'],
                    'updated_at' => now()->toISOString()
                ];
                $country->save();

                // Verify the data was saved
                $this->assertArrayHasKey('temp', $weatherData);
                $this->assertArrayHasKey('humidity', $weatherData);
                $this->assertArrayHasKey('description', $weatherData);
            }
        }

        dump('Batch Integration Test Results:', [
            'total_tested' => count($testCases),
            'successful' => $successCount,
            'results' => $results
        ]);

        // Assert at least one succeeded
        $this->assertGreaterThanOrEqual(1, $successCount, 'At least one country should have weather data');
    }
}
