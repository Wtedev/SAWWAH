<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    // تحديد الأعمدة التي يمكن ملؤها
    protected $fillable = [
        'user_id',
        'country_id',
        'start_date',
        'end_date',
        'notes'
    ];

    // إذا كانت الرحلة مرتبطة بدولة
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // إذا كانت الرحلة مرتبطة بالمستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
