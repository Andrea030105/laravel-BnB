<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Apartment;

class Service extends Model
{
    protected $fillable = [
        'name',
        'icon'
    ];

    public function apartaments()
    {
        return $this->belongsToMany(Apartment::class);
    }
}
