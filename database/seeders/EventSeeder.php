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
        $saudiArabia = Country::where('slug', 'saudi-arabia')->first();
        $uae = Country::where('slug', 'uae')->first();
        $qatar = Country::where('slug', 'qatar')->first();

        // مصفوفة الفعاليات
        $events = [
            [
                'name' => 'موسم الرياض 2025',
                'description' => 'أكبر موسم ترفيهي في المملكة العربية السعودية يضم العديد من الفعاليات والأنشطة المتنوعة للعائلات والزوار من جميع الأعمار',
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
                'tags' => ['ترفيه', 'عائلي', 'موسيقى', 'مهرجان']
            ],
            [
                'name' => 'مهرجان سعودي قيمز 2025',
                'description' => 'أكبر مهرجان للألعاب الإلكترونية في الشرق الأوسط مع بطولات عالمية وجوائز ضخمة',
                'city' => 'جدة',
                'location' => 'مدينة الملك عبدالله الاقتصادية',
                'start_date' => '2025-07-10',
                'end_date' => '2025-07-20',
                'is_featured' => true,
                'country_id' => $saudiArabia->id,
                'image' => 'esports.jpg',
                'category' => 'رياضات إلكترونية',
                'price' => 75.00,
                'capacity' => 10000,
                'tags' => ['ألعاب', 'إلكترونيات', 'بطولة', 'تقنية']
            ],
            [
                'name' => 'معرض إكسبو دبي التكنولوجي 2025',
                'description' => 'معرض تقني يجمع أحدث الابتكارات والتقنيات من جميع أنحاء العالم مع ورش عمل وندوات متخصصة',
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
                'tags' => ['تقنية', 'ابتكار', 'أعمال', 'معرض']
            ],
            [
                'name' => 'بطولة كأس العالم للإسنوكر 2025',
                'description' => 'بطولة عالمية للإسنوكر تجمع أفضل اللاعبين من مختلف دول العالم في منافسة قوية على اللقب',
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
                'tags' => ['رياضة', 'إسنوكر', 'بطولة', 'منافسة']
            ],
            [
                'name' => 'مهرجان قطر للتسوق 2025',
                'description' => 'مهرجان سنوي يقدم أفضل العروض والتخفيضات في مختلف المتاجر والمراكز التجارية مع عروض ترفيهية متنوعة',
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
                'tags' => ['تسوق', 'عروض', 'ترفيه', 'مهرجان']
            ],
            [
                'name' => 'معرض الذكاء الاصطناعي السعودي 2025',
                'description' => 'معرض متخصص في تقنيات الذكاء الاصطناعي وتطبيقاته في مختلف المجالات مع مشاركة شركات عالمية',
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
                'tags' => ['ذكاء اصطناعي', 'تقنية', 'ابتكار', 'معرض']
            ],
            [
                'name' => 'بطولة PUBG MOBILE العربية 2025',
                'description' => 'بطولة إقليمية للعبة ببجي موبايل بمشاركة أفضل الفرق العربية ونخبة من المحترفين العالميين',
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
                'tags' => ['ألعاب', 'إلكترونيات', 'بطولة', 'تنافس']
            ],
            [
                'name' => 'مهرجان البحر الأحمر السينمائي 2025',
                'description' => 'مهرجان سينمائي دولي يجمع أفضل الأفلام والمخرجين من مختلف أنحاء العالم في جدة',
                'city' => 'جدة',
                'location' => 'البحر الأحمر مول',
                'start_date' => '2025-12-05',
                'end_date' => '2025-12-15',
                'is_featured' => true,
                'country_id' => $saudiArabia->id,
                'image' => 'jeddah.jpg',
                'category' => 'فنون',
                'price' => 100.00,
                'capacity' => 5000,
                'tags' => ['سينما', 'فنون', 'ثقافة', 'مهرجان']
            ],
            [
                'name' => 'أسبوع أبوظبي للاستدامة 2025',
                'description' => 'مؤتمر عالمي حول الاستدامة والطاقة المتجددة والمدن الذكية بمشاركة خبراء دوليين',
                'city' => 'أبوظبي',
                'location' => 'مركز أبوظبي الوطني للمعارض',
                'start_date' => '2025-01-15',
                'end_date' => '2025-01-21',
                'is_featured' => true,
                'country_id' => $uae->id,
                'image' => 'abudhabi.jpg',
                'category' => 'مؤتمرات',
                'price' => 500.00,
                'capacity' => 2000,
                'tags' => ['استدامة', 'تكنولوجيا', 'طاقة', 'مؤتمر']
            ],
            [
                'name' => 'بطولة كأس آسيا لكرة السلة 2025',
                'description' => 'بطولة قارية لكرة السلة تجمع أقوى منتخبات آسيا في الدوحة',
                'city' => 'الدوحة',
                'location' => 'مجمع لوسيل الرياضي',
                'start_date' => '2025-06-10',
                'end_date' => '2025-06-25',
                'is_featured' => true,
                'country_id' => $qatar->id,
                'image' => 'fiba.jpg',
                'category' => 'رياضة',
                'price' => 75.00,
                'capacity' => 15000,
                'tags' => ['كرة سلة', 'رياضة', 'بطولة', 'منتخبات']
            ],
            [
                'name' => 'مهرجان الطائف للزهور 2025',
                'description' => 'مهرجان سنوي يحتفي بزهور الطائف العطرية وصناعة العطور التقليدية مع فعاليات ثقافية وترفيهية',
                'city' => 'الطائف',
                'location' => 'منتزه الردف',
                'start_date' => '2025-04-01',
                'end_date' => '2025-04-30',
                'is_featured' => true,
                'country_id' => $saudiArabia->id,
                'image' => 'taif.jpg',
                'category' => 'ثقافة',
                'price' => 20.00,
                'capacity' => null,
                'tags' => ['ثقافة', 'تراث', 'زهور', 'مهرجان']
            ],
            [
                'name' => 'مهرجان الكوميديا العربي 2025',
                'description' => 'أكبر مهرجان للكوميديا في الشرق الأوسط بمشاركة نخبة من الكوميديين العرب والعالميين',
                'city' => 'الرياض',
                'location' => 'مسرح محمد العلي',
                'start_date' => '2025-03-15',
                'end_date' => '2025-03-20',
                'is_featured' => true,
                'country_id' => $saudiArabia->id,
                'image' => 'comedy.jpg',
                'category' => 'ترفيه',
                'price' => 150.00,
                'capacity' => 3000,
                'tags' => ['كوميديا', 'ترفيه', 'عروض حية', 'مهرجان']
            ]
        ];

        // إضافة الفعاليات إلى قاعدة البيانات
        foreach ($events as $eventData) {
            $eventData['slug'] = Str::slug($eventData['name']);
            Event::create($eventData);
        }
    }
}
