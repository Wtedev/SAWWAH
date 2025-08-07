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
                'name' => 'المملكة العربية السعودية',
                'slug' => 'saudi-arabia',
                'description' => 'المملكة العربية السعودية، موطن الحرمين الشريفين ووجهة سياحية متنوعة تجمع بين التراث والحداثة.',
                'currency' => 'ريال سعودي',
                'image' => 'saudi-outline.png',
                'capital' => 'Riyadh',
                'capital_ar' => 'الرياض',
                'weather_info' => json_encode(['temp' => 35, 'condition' => 'مشمس']),
                'best_month_to_travel' => 'نوفمبر',
                'preferred_budget' => '1000-5000 دولار',
                'attraction' => 'مناطق سياحية مشهورة',
                'travel_with' => 'مع العائلة',
                'language_preference' => 'العربية'
            ],
            [
                'name' => 'الإمارات العربية المتحدة',
                'slug' => 'uae',
                'description' => 'الإمارات العربية المتحدة، تجمع بين الثقافة العربية الأصيلة والمعالم السياحية الحديثة والتسوق العالمي.',
                'currency' => 'درهم إماراتي',
                'image' => 'abudhabi.jpg',
                'capital' => 'Abu Dhabi',
                'capital_ar' => 'أبو ظبي',
                'weather_info' => json_encode(['temp' => 38, 'condition' => 'حار']),
                'best_month_to_travel' => 'ديسمبر',
                'preferred_budget' => '1000-5000 دولار',
                'attraction' => 'مناطق سياحية مشهورة',
                'travel_with' => 'مع العائلة',
                'language_preference' => 'العربية'
            ],
            [
                'name' => 'قطر',
                'slug' => 'qatar',
                'description' => 'دولة قطر، لؤلؤة الخليج العربي بمزيج فريد من التراث والحداثة.',
                'currency' => 'ريال قطري',
                'image' => 'doha.jpg',
                'capital' => 'Doha',
                'capital_ar' => 'الدوحة',
                'weather_info' => json_encode(['temp' => 36, 'condition' => 'مشمس']),
                'best_month_to_travel' => 'فبراير',
                'preferred_budget' => '1000-5000 دولار',
                'attraction' => 'فعاليات ثقافية أو رياضية',
                'travel_with' => 'مع الأصدقاء',
                'language_preference' => 'العربية'
            ],
            [
                'name' => 'البحرين',
                'slug' => 'bahrain',
                'description' => 'مملكة البحرين وجهة سياحية جذابة في الخليج العربي.',
                'currency' => 'دينار بحريني',
                'image' => 'manama.jpg',
                'capital' => 'Manama',
                'capital_ar' => 'المنامة',
                'weather_info' => json_encode(['temp' => 33, 'condition' => 'حار']),
                'best_month_to_travel' => 'نوفمبر',
                'preferred_budget' => '1000-5000 دولار',
                'attraction' => 'مناطق سياحية مشهورة',
                'travel_with' => 'مع العائلة',
                'language_preference' => 'العربية'
            ],
            [
                'name' => 'الكويت',
                'slug' => 'kuwait',
                'description' => 'دولة الكويت، تجمع بين التراث الخليجي الأصيل والحداثة المعاصرة.',
                'currency' => 'دينار كويتي',
                'image' => 'kuwait.jpg',
                'capital' => 'Kuwait City',
                'capital_ar' => 'مدينة الكويت',
                'weather_info' => json_encode(['temp' => 37, 'condition' => 'حار']),
                'best_month_to_travel' => 'نوفمبر',
                'preferred_budget' => '1000-5000 دولار',
                'attraction' => 'أسعار منخفضة',
                'travel_with' => 'مع العائلة',
                'language_preference' => 'العربية'
            ],
            [
                'name' => 'عمان',
                'slug' => 'oman',
                'description' => 'سلطنة عمان وجهة سياحية غنية بالتراث والطبيعة الخلابة.',
                'currency' => 'ريال عماني',
                'image' => 'oman.jpg',
                'capital' => 'Muscat',
                'capital_ar' => 'مسقط',
                'weather_info' => json_encode(['temp' => 32, 'condition' => 'مشمس']),
                'best_month_to_travel' => 'نوفمبر',
                'preferred_budget' => '1000-5000 دولار',
                'attraction' => 'مناطق سياحية مشهورة',
                'travel_with' => 'مع العائلة',
                'language_preference' => 'العربية'
            ],
            [
                'name' => 'مصر',
                'slug' => 'egypt',
                'description' => 'جمهورية مصر العربية، موطن الحضارة الفرعونية وكنوز التاريخ الإنساني.',
                'currency' => 'جنيه مصري',
                'image' => 'egypt.jpg',
                'capital' => 'Cairo',
                'capital_ar' => 'القاهرة',
                'weather_info' => json_encode(['temp' => 30, 'condition' => 'مشمس']),
                'best_month_to_travel' => 'أكتوبر',
                'preferred_budget' => 'أقل من 1000 دولار',
                'attraction' => 'مناطق سياحية مشهورة',
                'travel_with' => 'مع العائلة',
                'language_preference' => 'العربية'
            ],
            [
                'name' => 'الأردن',
                'slug' => 'jordan',
                'description' => 'المملكة الأردنية الهاشمية، موطن مدينة البتراء التاريخية ووجهة سياحية غنية بالآثار.',
                'currency' => 'دينار أردني',
                'image' => 'jordan.jpg',
                'capital' => 'Amman',
                'capital_ar' => 'عمّان',
                'weather_info' => json_encode(['temp' => 28, 'condition' => 'معتدل']),
                'best_month_to_travel' => 'أبريل',
                'preferred_budget' => '1000-5000 دولار',
                'attraction' => 'مناطق سياحية مشهورة',
                'travel_with' => 'مع العائلة',
                'language_preference' => 'العربية'
            ],
            [
                'name' => 'لبنان',
                'slug' => 'lebanon',
                'description' => 'الجمهورية اللبنانية، جوهرة البحر المتوسط وبلد الثقافة والسياحة المتنوعة.',
                'currency' => 'ليرة لبنانية',
                'image' => 'lebanon.jpg',
                'capital' => 'Beirut',
                'capital_ar' => 'بيروت',
                'weather_info' => json_encode(['temp' => 26, 'condition' => 'معتدل']),
                'best_month_to_travel' => 'يونيو',
                'preferred_budget' => '1000-5000 دولار',
                'attraction' => 'مناطق سياحية مشهورة',
                'travel_with' => 'مع الأصدقاء',
                'language_preference' => 'العربية'
            ],
            [
                'name' => 'تركيا',
                'slug' => 'turkey',
                'description' => 'الجمهورية التركية، ملتقى الشرق والغرب، وجهة سياحية تاريخية وثقافية متنوعة.',
                'currency' => 'ليرة تركية',
                'image' => 'istanbul.jpg',
                'capital' => 'Ankara',
                'capital_ar' => 'أنقرة',
                'weather_info' => json_encode(['temp' => 24, 'condition' => 'غائم جزئيًا']),
                'best_month_to_travel' => 'مايو',
                'preferred_budget' => '1000-5000 دولار',
                'attraction' => 'مناطق سياحية مشهورة',
                'travel_with' => 'مع العائلة',
                'language_preference' => 'الإنجليزية'
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
