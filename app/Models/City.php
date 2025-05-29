<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
        'city_hall_address',
        'coat_of_arms_url',
        'phone',
        'email',
        'web_address',
        'mayor_name',
        'latitude',
        'longitude',
    ];
}
