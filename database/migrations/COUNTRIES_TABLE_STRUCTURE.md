# بنية جدول البلدان النهائية

بعد تنظيف ملفات الهجرة، هذه هي بنية جدول البلدان النهائية:

| اسم العمود | نوع البيانات | الوصف |
|------------|--------------|-------|
| id | bigint(20) unsigned | المفتاح الأساسي |
| name | varchar(255) | اسم الدولة |
| slug | varchar(255) | المسار الفريد للدولة في الروابط |
| description | text | وصف الدولة |
| image | varchar(255) | مسار صورة الدولة |
| created_at | timestamp | تاريخ الإنشاء |
| updated_at | timestamp | تاريخ آخر تحديث |
| best_month_to_travel | varchar(100) | أفضل وقت للزيارة |
| preferred_budget | varchar(100) | الميزانية المفضلة |
| attraction | varchar(100) | أهم المميزات |
| travel_with | varchar(100) | نوع الرحلة |
| language_preference | varchar(100) | اللغة السائدة |
| capital | varchar(100) | العاصمة |
| capital_ar | varchar(100) | العاصمة باللغة العربية |
| currency | varchar(50) | العملة |
| postal_code | varchar(100) | الرمز البريدي |
| weather_info | json | معلومات الطقس |

## ملاحظات
1. تم توحيد جميع حقول النص مع تحديد أطوال مناسبة لكل حقل.
2. تم تغيير اسم `image_url` إلى `image` للتناسق.
3. تم التخلص من الأعمدة المكررة والغير مستخدمة.
4. يتم تخزين معلومات الطقس في حقل من نوع JSON للمرونة في إضافة بيانات متنوعة.

## نموذج Eloquent المقابل
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasWeather;

class Country extends Model
{
    use HasWeather;
    
    protected $fillable = [
        'name',
        'description',
        'currency',
        'weather_info',
        'image',
        'slug',
        'capital',
        'capital_ar',
        'best_month_to_travel',
        'preferred_budget',
        'attraction',
        'travel_with',
        'language_preference',
        'postal_code'
    ];

    protected $casts = ['weather_info' => 'object'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
```
