<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasWeather;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory, HasWeather;

    protected $dates = [
        'start_date',
        'end_date'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // تحديد الأعمدة التي يمكن ملؤها
    protected $fillable = [
        'user_id',
        'country_id',
        'start_date',
        'end_date',
        'notes'
    ];

    // إذا كانت الرحلة مرتبطة بالمستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
