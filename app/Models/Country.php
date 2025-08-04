<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected  $fillable = ['name','description','currency','weather_info','image','daily_budget','slug'];

    protected $casts = ['weather_info' => 'object'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
