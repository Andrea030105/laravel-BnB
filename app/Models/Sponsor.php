<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Apartment;

class Sponsor extends Model
{
    protected $fillable = [
        'name',
        'price',
        'hours'
    ];
    public function apartments()
    {
        return $this->belongsToMany(Apartment::class);
    }
}
