<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['car_brand', 'car_plate', 'car_make'];
}
