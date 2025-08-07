<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->country(),
            'slug' => fake()->slug(),
            'description' => fake()->paragraph(),
            'currency' => fake()->currencyCode(),
            'postal_code' => fake()->postcode(),
            'capital' => fake()->city(),
            'best_month_to_travel' => fake()->monthName(),
            'preferred_budget' => fake()->randomElement(['منخفض', 'متوسط', 'عالي']),
            'attraction' => fake()->sentence(),
            'travel_with' => fake()->randomElement(['عائلة', 'أصدقاء', 'فردي']),
            'language_preference' => fake()->randomElement(['عربي', 'انجليزي', 'فرنسي']),
        ];
    }
}
