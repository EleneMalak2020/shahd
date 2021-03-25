<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = [
        'phone', 'email', 'location_en', 'location_ar', 'location_link', 'whatsapp_number',
        'facebook_link', 'twitter_link', 'instagram_link', 'linkedin_link'
    ];

}
