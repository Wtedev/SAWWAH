<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class UpdateCountryDataSeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            [
                'name' => 'مصر',
                'slug' => 'egypt',
                'code' => 'EG',
                'capital' => 'Cairo',
                'capital_ar' => 'القاهرة',
                'description' => 'جمهورية مصر العربية، موطن الحضارة الفرعونية.',
                'best_month_to_travel' => 'أكتوبر',
                'preferred_budget' => '1000_to_5000',
                'attraction' => 'مناطق سياحية مشهورة',
                'travel_with' => 'العائلة',
                'language_preference' => 'العربية'
            ],
            [
                'name' => 'الأردن',
                'slug' => 'jordan',
                'code' => 'JO',
                'capital' => 'Amman',
                'capital_ar' => 'عمّان',
                'description' => 'المملكة الأردنية الهاشمية، موطن مدينة البتراء التاريخية.',
                'best_month_to_travel' => 'أبريل',
                'preferred_budget' => '1000_to_5000',
                'attraction' => 'مناطق سياحية مشهورة',
                'travel_with' => 'العائلة',
                'language_preference' => 'العربية'
            ],
            [
                'name' => 'لبنان',
                'slug' => 'lebanon',
                'code' => 'LB',
                'capital' => 'Beirut',
                'capital_ar' => 'بيروت',
                'description' => 'الجمهورية اللبنانية، جوهرة البحر المتوسط.',
                'best_month_to_travel' => 'يونيو',
                'preferred_budget' => '1000_to_5000',
                'attraction' => 'مناطق سياحية مشهورة',
                'travel_with' => 'العائلة',
                'language_preference' => 'العربية'
            ],
            [
                'name' => 'تركيا',
                'slug' => 'turkey',
                'code' => 'TR',
                'capital' => 'Ankara',
                'capital_ar' => 'أنقرة',
                'description' => 'الجمهورية التركية، ملتقى الشرق والغرب.',
                'best_month_to_travel' => 'مايو',
                'preferred_budget' => '1000_to_5000',
                'attraction' => 'مناطق سياحية مشهورة',
                'travel_with' => 'العائلة',
                'language_preference' => 'التركية'
            ]
        ];

        foreach ($countries as $country) {
            Country::updateOrCreate(
                ['slug' => $country['slug']],
                $country
            );
        }
    }
}
