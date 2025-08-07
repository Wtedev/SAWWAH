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
        'description',
        'currency',
        'weather_info',
        'image',
        'daily_budget',
        'slug',
        'capital'
    ];

    protected $casts = ['weather_info' => 'object'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
