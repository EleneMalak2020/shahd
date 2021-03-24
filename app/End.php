<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class End extends Model
{
    public function products()
    {
        return $this->hasMany(Sproduct::class);
    }

}
