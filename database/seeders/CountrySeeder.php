<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            [
                'name' => 'السعودية',
                'slug' => 'saudi-arabia',
                'code' => 'SA',
                'capital' => 'Riyadh',
                'capital_ar' => 'الرياض',
                'description' => 'المملكة العربية السعودية هي وجهة سياحية غنية بالتراث والثقافة.',
                'image_url' => 'saudi.jpg',
                'best_month_to_travel' => 'نوفمبر',
                'preferred_budget' => '1000_to_5000',
                'attraction' => 'مناطق سياحية مشهورة',
                'travel_with' => 'العائلة',
                'language_preference' => 'العربية'
            ],
            [
                'name' => 'الإمارات',
                'slug' => 'uae',
                'code' => 'AE',
                'capital' => 'Abu Dhabi',
                'capital_ar' => 'أبو ظبي',
                'description' => 'الإمارات العربية المتحدة وجهة تجمع بين الحداثة والأصالة.',
                'image_url' => 'uae.jpg',
                'best_month_to_travel' => 'نوفمبر',
                'preferred_budget' => '1000_to_5000',
                'attraction' => 'مناطق سياحية مشهورة',
                'travel_with' => 'العائلة',
                'language_preference' => 'العربية'
            ],
            [
                'name' => 'قطر',
                'slug' => 'qatar',
                'code' => 'QA',
                'capital' => 'Doha',
                'capital_ar' => 'الدوحة',
                'description' => 'قطر وجهة سياحية تجمع بين التراث والتطور.',
                'image_url' => 'qatar.jpg',
                'best_month_to_travel' => 'نوفمبر',
                'preferred_budget' => '1000_to_5000',
                'attraction' => 'مناطق سياحية مشهورة',
                'travel_with' => 'العائلة',
                'language_preference' => 'العربية'
            ],
            [
                'name' => 'البحرين',
                'slug' => 'bahrain',
                'code' => 'BH',
                'capital' => 'Manama',
                'capital_ar' => 'المنامة',
                'description' => 'مملكة البحرين وجهة سياحية جذابة في الخليج العربي.',
                'image_url' => 'bahrain.jpg',
                'best_month_to_travel' => 'نوفمبر',
                'preferred_budget' => '1000_to_5000',
                'attraction' => 'مناطق سياحية مشهورة',
                'travel_with' => 'العائلة',
                'language_preference' => 'العربية'
            ],
            [
                'name' => 'الكويت',
                'slug' => 'kuwait',
                'code' => 'KW',
                'capital' => 'Kuwait City',
                'capital_ar' => 'مدينة الكويت',
                'description' => 'دولة الكويت وجهة سياحية مميزة في الخليج العربي.',
                'image_url' => 'kuwait.jpg',
                'best_month_to_travel' => 'نوفمبر',
                'preferred_budget' => '1000_to_5000',
                'attraction' => 'مناطق سياحية مشهورة',
                'travel_with' => 'العائلة',
                'language_preference' => 'العربية'
            ],
            [
                'name' => 'عمان',
                'slug' => 'oman',
                'code' => 'OM',
                'capital' => 'Muscat',
                'capital_ar' => 'مسقط',
                'description' => 'سلطنة عمان وجهة سياحية غنية بالتراث والطبيعة الخلابة.',
                'image_url' => 'oman.jpg',
                'best_month_to_travel' => 'نوفمبر',
                'preferred_budget' => '1000_to_5000',
                'attraction' => 'مناطق سياحية مشهورة',
                'travel_with' => 'العائلة',
                'language_preference' => 'العربية'
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
