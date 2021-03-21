<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aria extends Model
{
    protected $fillable = [
        'name_en', 'name_ar', 'delivery_cost'
    ];
}
