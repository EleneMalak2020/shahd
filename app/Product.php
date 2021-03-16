<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'name_en', 'name_ar', 'price', 'image'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
