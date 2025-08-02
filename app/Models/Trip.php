<?php

namespace App\Models;

<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> e80a85e91ffad3608c15fdcb1ee44c0e4ce02437
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
<<<<<<< HEAD
    //
=======
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
>>>>>>> e80a85e91ffad3608c15fdcb1ee44c0e4ce02437
}
