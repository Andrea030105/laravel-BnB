<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Apartment;

class Message extends Model
{
    protected $fillable = [
        'apartment_id',
        'email',
        'name',
        'content'
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
