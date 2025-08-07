<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasWeather;

class Country extends Model
{
    use HasWeather;
    protected $fillable = [
        'name',
        'code',
        'postal_code',
        'description',
        'currency',
        'weather_info',
        'image',
        'daily_budget',
        'slug',
        'capital',
        'best_month_to_travel',
        'preferred_budget',
        'attraction',
        'travel_with',
        'language_preference'
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
