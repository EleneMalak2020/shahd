<?php

use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('infos')->insert([
            'id'    =>  '1',
            'phone' =>  '123456789',
            'email' =>  'test@email.com',
            'location_en'   => 'location in EN',
            'location_ar'   => 'العنوان باللغة العربية',
            'location_link' =>  'https://www.google.com/maps/dir//31.2613,29.984338/@31.2612286,29.9843853,21z',
            'whatsapp_number' =>  'https://web.whatsapp.com/',
            'facebook_link' =>  'facebook.com',
            'twitter_link'  => 'twitter.com',
            'instagram_link' => 'instagram_link',
            'linkedin_link' =>  'linkedin_link',
        ]);

    }
}
