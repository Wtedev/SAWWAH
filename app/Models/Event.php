<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'country_id',
        'title',
        'slug',
        'description',
        'city',
        'start_date',
        'end_date',
        'date',
        'location',
        'image'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}