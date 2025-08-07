<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'country_id',
        'name',
        'title',
        'slug',
        'description',
        'city',
        'location',
        'image',
        'start_date',
        'end_date',
        'is_featured',
        'capacity',
        'price',
        'category',
        'tags'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
        'tags' => 'array'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
