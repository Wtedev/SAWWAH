<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
    protected $fillable = [
        'country_id', 'title', 'description', 'date', 'location', 'image'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}