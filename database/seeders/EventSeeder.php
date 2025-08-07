<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // الحصول على معرفات الدول
        $saudiArabia = Country::where('code', 'SA')->first();
        $uae = Country::where('code', 'AE')->first();
        $qatar = Country::where('code', 'QA')->first();

        // مصفوفة الفعاليات
        $events = [
            [
                'name' => 'موسم الرياض 2025',
                'description' => 'أكبر موسم ترفيهي في المملكة العربية السعودية يضم العديد من الفعاليات والأنشطة المتنوعة',
                'city' => 'الرياض',
                'location' => 'بوليفارد رياض سيتي',
                'start_date' => '2025-10-01',
                'end_date' => '2025-12-31',
                'is_featured' => true,
                'country_id' => $saudiArabia->id,
                'image' => 'riyadh.jpg',
                'category' => 'ترفيه',
                'price' => null,
                'capacity' => null,
                'tags' => ['ترفيه', 'عائلي', 'موسيقى']
            ],
            [
                'name' => 'معرض إكسبو دبي التكنولوجي',
                'description' => 'معرض تقني يجمع أحدث الابتكارات والتقنيات من جميع أنحاء العالم',
                'city' => 'دبي',
                'location' => 'مركز دبي التجاري العالمي',
                'start_date' => '2025-09-15',
                'end_date' => '2025-09-20',
                'is_featured' => true,
                'country_id' => $uae->id,
                'image' => 'dubai.jpg',
                'category' => 'تكنولوجيا',
                'price' => 199.00,
                'capacity' => 5000,
                'tags' => ['تقنية', 'ابتكار', 'أعمال']
            ],
            [
                'name' => 'بطولة كأس العالم للإسنوكر',
                'description' => 'بطولة عالمية للإسنوكر تجمع أفضل اللاعبين من مختلف دول العالم',
                'city' => 'جدة',
                'location' => 'مجمع الملك عبدالله الرياضي',
                'start_date' => '2025-08-20',
                'end_date' => '2025-08-27',
                'is_featured' => true,
                'country_id' => $saudiArabia->id,
                'image' => 'snooker.jpg',
                'category' => 'رياضة',
                'price' => 150.00,
                'capacity' => 2000,
                'tags' => ['رياضة', 'إسنوكر', 'بطولة']
            ],
            [
                'name' => 'مهرجان قطر للتسوق',
                'description' => 'مهرجان سنوي يقدم أفضل العروض والتخفيضات في مختلف المتاجر والمراكز التجارية',
                'city' => 'الدوحة',
                'location' => 'مول قطر',
                'start_date' => '2025-11-01',
                'end_date' => '2025-11-30',
                'is_featured' => true,
                'country_id' => $qatar->id,
                'image' => 'doha.jpg',
                'category' => 'تسوق',
                'price' => null,
                'capacity' => null,
                'tags' => ['تسوق', 'عروض', 'ترفيه']
            ],
            [
                'name' => 'معرض الذكاء الاصطناعي السعودي',
                'description' => 'معرض متخصص في تقنيات الذكاء الاصطناعي وتطبيقاته في مختلف المجالات',
                'city' => 'الرياض',
                'location' => 'مركز الرياض الدولي للمؤتمرات والمعارض',
                'start_date' => '2025-09-05',
                'end_date' => '2025-09-07',
                'is_featured' => true,
                'country_id' => $saudiArabia->id,
                'image' => 'ai.png',
                'category' => 'تكنولوجيا',
                'price' => 299.00,
                'capacity' => 3000,
                'tags' => ['ذكاء اصطناعي', 'تقنية', 'ابتكار']
            ],
            [
                'name' => 'بطولة PUBG MOBILE العربية',
                'description' => 'بطولة إقليمية للعبة ببجي موبايل بمشاركة أفضل الفرق العربية',
                'city' => 'الرياض',
                'location' => 'واجهة الرياض',
                'start_date' => '2025-08-15',
                'end_date' => '2025-08-17',
                'is_featured' => true,
                'country_id' => $saudiArabia->id,
                'image' => 'pubg.jpg',
                'category' => 'رياضات إلكترونية',
                'price' => 50.00,
                'capacity' => 1000,
                'tags' => ['ألعاب', 'إلكترونيات', 'بطولة']
            ]
        ];

        // إضافة الفعاليات إلى قاعدة البيانات
        foreach ($events as $eventData) {
            $eventData['slug'] = Str::slug($eventData['name']);
            Event::create($eventData);
        }
    }
}
