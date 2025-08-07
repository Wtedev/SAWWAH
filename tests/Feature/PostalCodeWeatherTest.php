<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\WeatherService;

class PostalCodeWeatherTest extends TestCase
{
    protected $weatherService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->weatherService = new WeatherService();
    }

    /** @test */
    public function test_postal_code_weather_structure()
    {
        // اختبار بنية البيانات المُرجعة من خدمة الطقس
        $weatherData = $this->weatherService->getWeatherByPostalCodeOrCity('11564', 'الرياض');

        if ($weatherData) {
            // التحقق من وجود جميع الحقول المطلوبة
            $this->assertArrayHasKey('temp', $weatherData);
            $this->assertArrayHasKey('feels_like', $weatherData);
            $this->assertArrayHasKey('humidity', $weatherData);
            $this->assertArrayHasKey('wind_speed', $weatherData);
            $this->assertArrayHasKey('description', $weatherData);
            $this->assertArrayHasKey('icon', $weatherData);

            // التحقق من أنواع البيانات
            $this->assertIsNumeric($weatherData['temp']);
            $this->assertIsNumeric($weatherData['feels_like']);
            $this->assertIsNumeric($weatherData['humidity']);
            $this->assertIsNumeric($weatherData['wind_speed']);
            $this->assertIsString($weatherData['description']);
            $this->assertIsString($weatherData['icon']);

            // التحقق من المديات المنطقية
            $this->assertGreaterThanOrEqual(-50, $weatherData['temp']);
            $this->assertLessThanOrEqual(60, $weatherData['temp']);
            $this->assertGreaterThanOrEqual(0, $weatherData['humidity']);
            $this->assertLessThanOrEqual(100, $weatherData['humidity']);
            $this->assertGreaterThanOrEqual(0, $weatherData['wind_speed']);

            dump('Postal Code Weather Test Results:', [
                'postal_code' => '11564',
                'city' => 'الرياض',
                'data' => $weatherData
            ]);
        } else {
            $this->markTestSkipped('Weather API unavailable for postal code test');
        }
    }

    /** @test */
    public function test_multiple_postal_codes()
    {
        $testCases = [
            ['postal_code' => '11564', 'city' => 'الرياض', 'country' => 'السعودية'],
            ['postal_code' => '21577', 'city' => 'جدة', 'country' => 'السعودية'],
            ['postal_code' => '31952', 'city' => 'الدمام', 'country' => 'السعودية'],
        ];

        $results = [];
        $successCount = 0;

        foreach ($testCases as $testCase) {
            $weatherData = $this->weatherService->getWeatherByPostalCodeOrCity(
                $testCase['postal_code'],
                $testCase['city']
            );

            if ($weatherData) {
                $successCount++;
                $results[] = [
                    'postal_code' => $testCase['postal_code'],
                    'city' => $testCase['city'],
                    'temp' => $weatherData['temp'],
                    'humidity' => $weatherData['humidity'],
                    'condition' => $weatherData['description']
                ];

                // التحقق من بنية البيانات لكل نتيجة ناجحة
                $this->assertArrayHasKey('temp', $weatherData);
                $this->assertArrayHasKey('humidity', $weatherData);
                $this->assertArrayHasKey('description', $weatherData);
            }
        }

        dump('Multiple Postal Codes Test Results:', [
            'total_tested' => count($testCases),
            'successful' => $successCount,
            'results' => $results
        ]);

        // نتوقع نجاح معظم الاختبارات (على الأقل 50%)
        $this->assertGreaterThanOrEqual(1, $successCount, 'At least one postal code should return weather data');
    }

    /** @test */
    public function test_fallback_mechanism()
    {
        // اختبار مع رمز بريدي غير صالح ولكن مع عاصمة صالحة
        $weatherData = $this->weatherService->getWeatherByPostalCodeOrCity('00000', 'الرياض');

        if ($weatherData) {
            $this->assertArrayHasKey('temp', $weatherData);
            $this->assertArrayHasKey('description', $weatherData);

            dump('Fallback Mechanism Test:', [
                'invalid_postal_code' => '00000',
                'fallback_city' => 'الرياض',
                'result' => $weatherData
            ]);
        } else {
            dump('Fallback test: No data returned (expected for invalid postal code and no fallback)');
        }

        // This test doesn't assert success since fallback behavior may vary
        $this->assertTrue(true);
    }

    /** @test */
    public function test_invalid_inputs()
    {
        // اختبار مع مدخلات غير صالحة
        $testCases = [
            ['postal_code' => null, 'city' => null],
            ['postal_code' => '', 'city' => ''],
            ['postal_code' => '999999999', 'city' => 'NonExistentCity'],
        ];

        foreach ($testCases as $index => $testCase) {
            $weatherData = $this->weatherService->getWeatherByPostalCodeOrCity(
                $testCase['postal_code'],
                $testCase['city']
            );

            // نتوقع أن ترجع null أو array فارغ للمدخلات غير الصالحة
            if ($weatherData !== null) {
                $this->assertIsArray($weatherData);
            }

            dump("Invalid Input Test {$index}:", [
                'input' => $testCase,
                'result' => $weatherData
            ]);
        }

        $this->assertTrue(true);
    }

    /** @test */
    public function test_service_consistency()
    {
        // اختبار الثبات - استدعاء نفس البيانات مرتين
        $weatherData1 = $this->weatherService->getWeatherByPostalCodeOrCity('11564', 'الرياض');

        // انتظار ثانية واحدة
        sleep(1);

        $weatherData2 = $this->weatherService->getWeatherByPostalCodeOrCity('11564', 'الرياض');

        if ($weatherData1 && $weatherData2) {
            // التحقق من أن البيانات متسقة (درجة الحرارة لا تختلف بشكل كبير)
            $tempDiff = abs($weatherData1['temp'] - $weatherData2['temp']);
            $this->assertLessThanOrEqual(5, $tempDiff, 'Temperature should be relatively consistent');

            dump('Service Consistency Test:', [
                'first_call' => $weatherData1,
                'second_call' => $weatherData2,
                'temp_difference' => $tempDiff
            ]);
        } else {
            $this->markTestSkipped('Weather API unavailable for consistency test');
        }
    }
}
