<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Message;

class Apartment extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'rooms',
        'bathrooms',
        'bedrooms',
        'square_meters',
        'address',
        'latitude',
        'longitude',
        'image',
        'price_per_night',
        'visibility',
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
